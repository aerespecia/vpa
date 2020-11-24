<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use App\Models\Property\PropertyDetail;
use App\Models\Property\PropertyPrice;
use App\Models\Property\PropertySummary;
use App\Models\Setting;
use App\Models\Calculation;
use App\Models\Zestimate\Zestimate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Imports\PropertyImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = new Setting();
        $setting->profile_id = 1;
        $setting->id = uniqid();
        $setting->save();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = $request->all();
        $property = new Property();
        $property->address = $inputs["propertyAddress"];
        $property->save();

        $property->propertyDetails()->firstOrCreate([
            'id'=>uniqid(),
            'sq_ft'=>$inputs["sqft"]
        ]);

        $propertyPrice = PropertyPrice::firstOrCreate([
            'id'=>uniqid(),
            'purchase_price' => $inputs["price"]
        ]);

        $property->propertySummary()->firstOrCreate([
            'property_price_id'=>$propertyPrice->id
        ]);

        $zestimate = $inputs["zestimate"];
        $property->zestimates()->firstOrCreate([
            'id'=>uniqid(),
            'zestimate'=>$zestimate
        ]);

        $settings = Setting::first();
        $calculation = new Calculation();
        if($zestimate != 0) {
            $agentCommission = $settings->agent_commission * $zestimate;
            $sellingConcession = $settings->selling_concession * $zestimate;
            $closingFees = $settings->closing_fees * $zestimate;
            $taxes = $settings->taxes * $zestimate;

            $closingCost = $agentCommission + $sellingConcession + $closingFees + $taxes;

            $construction_light = $settings->chosen_construction_cost == 1 ?
                $settings->construction_light * $inputs["sqft"] : 0;
            $construction_medium = $settings->chosen_construction_cost == 2 ?
                $settings->construction_medium * $inputs["sqft"] : 0;
            $construction_heavy = $settings->chosen_construction_cost == 3 ?
                $settings->construction_heavy * $inputs["sqft"] : 0;
            $construction_groundup = $settings->chosen_construction_cost == 4 ?
                $settings->construction_groundup * $inputs["sqft"] : 0;

            $constructionCost = 0;
            if($construction_light > 0)
                $constructionCost = $construction_light;
            if($construction_medium > 0)
                $constructionCost = $construction_medium;
            if($construction_heavy > 0)
                $constructionCost = $construction_heavy;
            if($construction_groundup > 0)
                $constructionCost = $construction_groundup;

            $totalEstimatedSellingCost = $constructionCost + $closingCost;
            $netProceeds = $zestimate - ($totalEstimatedSellingCost + $inputs["price"]);

            $calculation->construction_cost = $constructionCost;
            $calculation->closing_cost = $closingCost;
            $calculation->total_estimated_selling_cost = $totalEstimatedSellingCost;
            $calculation->net_proceeds = $netProceeds;
            $calculation->property_id = $property->id;
            $calculation->save();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    public function import()
    {
        Excel::import(new PropertyImport, 'actives.csv');

        return redirect('/')->with('success', 'All good!');
    }


    /**
     * Return all records of properties
     */
    public function all()
    {
        $properties = Property::join('property_details','property_details');

        return collect([
            "iTotalRecords"=>count($properties),
            "iTotalDisplayRecords"=>count($properties),
            "data"=>$properties
        ]);
    }

    /**
     * Return all records of properties
     */
    public function calculationSummary()
    {
        $properties = Property::select([
                            'properties.address',
                            DB::raw('FORMAT(pd.sq_ft,0) as sq_ft'),
                            DB::raw('FORMAT(pp.purchase_price,2) as purchase_price'),
                            DB::raw('FORMAT(z.zestimate,2) as zestimate'),
                            DB::raw('FORMAT(c.construction_cost,2) as construction_cost'),
                            DB::raw('FORMAT(c.closing_cost,2) as closing_cost'),
                            DB::raw('FORMAT(c.total_estimated_selling_cost,2) as total_estimated_selling_cost'),
                            DB::raw('FORMAT(c.net_proceeds,2) as net_proceeds')
                        ])
                        ->join('property_details as pd','pd.property_id','=','properties._id')
                        ->leftjoin('calculations as c','c.property_id','=','properties._id')
                        ->join('zestimates as z','z.property_id','=','properties._id')
                        ->join('property_summaries as ps','ps.property_id','=','properties._id')
                        ->join('property_prices as pp','pp._id','=','ps.property_price_id')
                        ->get();

        return collect([
            "iTotalRecords"=>count($properties),
            "iTotalDisplayRecords"=>count($properties),
            "data"=>$properties
        ]);
    }

    /**
     * Get Zestimate
     */
    public function getZestimate(Request $request)
    {
        $response = Http::get('https://api.bridgedataoutput.com/api/v2/zestimates', [
            'access_token' => '7713f293adb8ab1f60972ec2031e0005',
            'address' => $request->query('address'),
        ]);

        if(count($response["bundle"]) == 0)
            return collect(["zestimate"=>0,"rentalZestimate"=>0]);
        else
            return collect([
                "zestimateRaw"=>$response["bundle"][0]["zestimate"],
                "zestimate"=>number_format($response["bundle"][0]["zestimate"],2),
                "rentalZestimate"=>number_format($response["bundle"][0]["rental"]["zestimate"],2),
                "long"=>$response["bundle"][0]["coordinates"][0],
                "lat"=>$response["bundle"][0]["coordinates"][1]
            ]);
    }



}
