<?php

namespace App\Imports;

use App\Models\Property\Property;
use App\Models\Property\PropertyPrice;
use App\Models\Setting;
use App\Models\Calculation;

use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class PropertyImport implements OnEachRow, WithHeadingRow
{
    // public function headingRow(): int
    // {
    //     return 2;
    // }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        Log::info('Inserting row to database',$row);
        Log::info('Row: ',$row);

        $zestimatesAPI = Http::get('https://api.bridgedataoutput.com/api/v2/zestimates', [
            'access_token' => '7713f293adb8ab1f60972ec2031e0005',
            'address' => $row['address'],
        ]);

        $long = 0;
        $lat = 0;
        $zestimate = 0;
        $rentalZestimate = 0;


        if(count($zestimatesAPI["bundle"]) > 0) {
            $zestimate=$zestimatesAPI["bundle"][0]["zestimate"];
            // $rentalZestimate = $zestimatesAPI["bundle"][0]["rental"]["zestimate"];
            // $long=$zestimatesAPI["bundle"][0]["coordinates"][0];
            // $lat=$zestimatesAPI["bundle"][0]["coordinates"][1];
        }

        $property = Property::firstOrCreate([
            'id'=>uniqid(),
            'address'=>$row['address'],
            'ml_number'=>$row['ml_number'] ? $row['ml_number'] : 0,
            'city'=>$row['address_city'],
            'listing_date'=>$row['listing_date'],
            'zip_code'=>$row['address_zip'],
            'year_built'=>$row['year_built'],
            'street_number'=>$row['address_street_number'],
            'street_name'=>$row['address_street_name'],
            'street_suffix'=>$row['address_street_suffix'],
            'state'=>$row['address_state'],
            'area'=>$row['area'],
            'district'=>$row['district'],
            'longitude'=>$long,
            'latitude'=>$lat,
        ]);

        $property->zestimates()->firstOrCreate([
            'id'=>uniqid(),
            'zestimate'=>$zestimate
        ]);

        $property->rentZestimates()->firstOrCreate([
            'id'=>uniqid(),
            'rent_zestimate' => $rentalZestimate,
        ]);

        $property->propertyStatus()->firstOrCreate([
            'id'=>uniqid(),
            'status'=> $row['status'],
            'date'=>date('Y-m-d'),
            'inventory_type'=>$row['inventory_type']
        ]);

        $property->propertyDetails()->firstOrCreate([
            'id'=>uniqid(),
            'bed_room' => $row['bedrooms'],
            'bath_room'=>$row['bathrooms'],
            'lot_size'=>$row['lot_size_sq_ft'],
            'sq_ft'=>$row['square_footage']
        ]);

        $propertyPrice = PropertyPrice::firstOrCreate([
            'price_per_square_foot' => $row['price_per_square_foot'],
            'listing_price' => $row['listing_price'],
            'original_listing_price' => $row['orig_list_price'],
            'purchase_price' => $row['purchase_price']
        ]);

        $property->propertySummary()->firstOrCreate([
            'property_price_id'=>$propertyPrice->id
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
                    $constructionCost = $settings->construction_light * $row["sqft"];
                    break;
                case 2:
                    $settings->construction_medium * $row["sqft"];
                    break;
                case 3:
                    $settings->construction_heavy * $row["sqft"];
                    break;
                case 4:
                    $settings->construction_groundup * $row["sqft"];
                    break;
            }

            $totalEstimatedSellingCost = $constructionCost + $closingCost;
            $netProceeds = $zestimate - ($totalEstimatedSellingCost + $row['purchase_price']);

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

}
