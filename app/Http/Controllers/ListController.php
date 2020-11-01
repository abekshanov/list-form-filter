<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use App\Services\DistrictService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $filters['city_name'] = ($request->input('city_name')) ? $request->input('city_name') : null;
        $filters['district_name'] = ($request->input('district_name')) ? $request->input('district_name') : null;
        $cities = (new CityService())->getWithFilters($filters);
//        $districts = (new DistrictService())->getWithFilters($filters);

        return view('list', compact('cities'));
    }
}
