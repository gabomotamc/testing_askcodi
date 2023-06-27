<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function allCountries()
    {
        $countries = Country::all();
        return response()->json([
            'countries' => $countries,
        ], 200);
    }

    public function getCountriesByName($name)
    {   
        $response = Country::where('name',$name)->first();
        return response()->json([
            'search_keywords' => $name,                       
            'country' => $response,
        ], 200);
    }

    public function getCountryByISO3($iso_3)
    {
        $response = Country::where('iso_3',$iso_3)->first();
        return response()->json([
            'search_keywords' => $iso_3,            
            'country' => $response,
        ], 200);
    }

    public function getCountriesByCapital($capital)
    {
        $response = Country::where('capital',$capital)->first();
        return response()->json([
            'search_keywords' => $capital,
            'country' => $response,
        ], 200);
    }    

    
}

