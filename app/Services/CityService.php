<?php
/**
 * Author: abekshanov
 * DateStart: 29.10.2020
 * TimeStart: 1:58
 * Created with PhpStorm
 **/

namespace App\Services;


use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Builder;

class CityService
{
    public function getWithFilters1(array $filters = null): Collection
    {
        $query = City::query()->with('districts');
        if ($filters['city_name']) {
            $query->where('name', 'LIKE', '%' . $filters['city_name'] . '%');
        }
        if ($filters['district_name']) {
            $query->whereHas('districts', function ($q) use ($filters) {
                $q->where('name', 'LIKE', '%' . $filters['district_name'] . '%');
            });
        }
dd($query->get());
        return $query->get();
    }

    public function getWithFilters(array $filters = null): Collection
    {
        $query = City::query()
            ->join('districts', 'cities.id', '=', 'districts.city_id')
            ->select('cities.name as name', 'cities.translit_name as translit_name', 'cities.id as id',
                'districts.name as district_name','districts.translit_name as district_translit_name' );

        if ($filters['city_name']) {
            $query->where('cities.name', 'LIKE', '%' . $filters['city_name'] . '%');
        }
        if ($filters['district_name']) {
            $query->where('districts.name', 'LIKE', '%' . $filters['district_name'] . '%');
        }

        return $query->get();
    }
}