<?php

namespace App\Http\Controllers;

use App\Models\Property\Property;
use App\Models\Setting;
use App\Models\Zestimate\Zestimate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Imports\PropertyImport;
use Maatwebsite\Excel\Facades\Excel;

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
        $properties = Property::join('property_details','property_details.property_id','=','properties.id')
                        ->select('property.address')
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
            return collect(["zestimate"=>"N/A","rentalZestimate"=>"N/A"]);
        else
            return collect([
                "zestimate"=>number_format($response["bundle"][0]["zestimate"],2),
                "rentalZestimate"=>number_format($response["bundle"][0]["rental"]["zestimate"],2),
                "long"=>$response["bundle"][0]["coordinates"][0],
                "lat"=>$response["bundle"][0]["coordinates"][1]
            ]);
    }



}
