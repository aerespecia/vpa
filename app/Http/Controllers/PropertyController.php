<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Calculation;
use Illuminate\Http\Request;
use App\Imports\PropertyImport;
use App\Models\PropertySetting;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;
use App\Models\Zestimate\Zestimate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Property\PropertyType;
use App\Models\Property\PropertyPrice;
use App\Models\Property\PropertyDetail;
use App\Models\Property\PropertySummary;

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
            $constructionCost = 0;

            switch ($settings->chosen_construction_cost) {
                case 1:
                    $constructionCost = $settings->construction_light * $inputs["sqft"];
                    break;
                case 2:
                    $settings->construction_medium * $inputs["sqft"];
                    break;
                case 3:
                    $settings->construction_heavy * $inputs["sqft"];
                    break;
                case 4:
                    $settings->construction_groundup * $inputs["sqft"];
                    break;
            }

            $totalEstimatedSellingCost = $constructionCost + $closingCost;
            $netProceeds = $zestimate - ($totalEstimatedSellingCost + $inputs["price"]);

            $calculation->construction_cost = $constructionCost;
            $calculation->closing_cost = $closingCost;
            $calculation->total_estimated_selling_cost = $totalEstimatedSellingCost;
            $calculation->net_proceeds = $netProceeds;
            $calculation->property_id = $property->id;
            $calculation->save();

            $property->propertySetting()->firstOrCreate([
                'agent_commission' => $settings->agent_commission,
                'selling_concession' => $settings->selling_concession,
                'closing_fees' => $settings->closing_fees,
                'taxes' => $settings->taxes,
                'construction_light' => $settings->construction_light,
                'construction_medium' => $settings->construction_medium,
                'construction_heavy' =>  $settings->construction_heavy,
                'construction_groundup' => $settings->construction_groundup,
                'chosen_construction_cost' => $settings->chosen_construction_cost
            ]);


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
                            'properties._id as property_id',
                            'properties.address',
                            DB::raw('pd.sq_ft as sq_ft'),
                            DB::raw('pp.purchase_price as purchase_price'),
                            DB::raw('z.zestimate as zestimate'),
                            DB::raw('c.construction_cost as construction_cost'),
                            DB::raw('c.closing_cost as closing_cost'),
                            DB::raw('c.total_estimated_selling_cost as total_estimated_selling_cost'),
                            DB::raw('c.net_proceeds as net_proceeds'),
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
     * Get property calculation
     */
    public function propertyCalculation($id)
    {
        $propertyCalculation = Property::select([
                            'properties._id as property_id',
                            'properties.address',
                            'pd.bed_room',
                            'pd.bath_room',
                            DB::raw('pd.sq_ft as sq_ft'),
                            DB::raw('pp.purchase_price as purchase_price'),
                            DB::raw('z.zestimate as zestimate'),
                            DB::raw('c.construction_cost as construction_cost'),
                            DB::raw('c.closing_cost as closing_cost'),
                            DB::raw('c.total_estimated_selling_cost as total_estimated_selling_cost'),
                            DB::raw('c.net_proceeds as net_proceeds'),
                            DB::raw('pset.agent_commission as agent_commision_pct'),
                            DB::raw('pset.agent_commission * z.zestimate as agent_commision_amount'),
                            DB::raw('pset.selling_concession as selling_concession_pct'),
                            DB::raw('pset.selling_concession * z.zestimate as selling_concession_amount'),
                            DB::raw('pset.closing_fees as closing_fees_pct'),
                            DB::raw('pset.closing_fees * z.zestimate as closing_fees_amount'),
                            DB::raw('pset.taxes as taxes_pct'),
                            DB::raw('pset.taxes * z.zestimate as taxes_amount'),
                            DB::raw('pset.chosen_construction_cost'),
                            DB::raw('pset.construction_light'),
                            DB::raw('pset.construction_medium'),
                            DB::raw('pset.construction_heavy'),
                            DB::raw('pset.construction_groundup'),
                        ])
                        ->join('property_details as pd','pd.property_id','=','properties._id')
                        ->leftjoin('calculations as c','c.property_id','=','properties._id')
                        ->join('zestimates as z','z.property_id','=','properties._id')
                        ->join('property_summaries as ps','ps.property_id','=','properties._id')
                        ->join('property_prices as pp','pp._id','=','ps.property_price_id')
                        ->join('property_settings as pset','pset.property_id','=','properties._id')
                        ->where('properties._id','=',$id)
                        ->first();

        return $propertyCalculation;
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
