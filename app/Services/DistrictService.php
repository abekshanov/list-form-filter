<?php
/**
 * Author: abekshanov
 * DateStart: 29.10.2020
 * TimeStart: 1:59
 * Created with PhpStorm
 **/

namespace App\Services;


use App\Models\District;
use Illuminate\Database\Eloquent\Collection;

class DistrictService
{
    public function getWithFilters(string $filters = null): Collection
    {
        $query = District::query();
        if ($filters['district_name']) {
            $query->where('name', 'LIKE', $filters['district_name']);
        }
        return $query->get();
    }

}