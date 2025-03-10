<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class CountriesModel extends Model
{
    use HasFactory;

    protected $table = 'countries';


    static public function getRecord($request)
    {
        $return = self::select('countries.*','regions.regions_name')
            ->join('regions', 'regions.id', '=', 'countries.regions_id')
            ->orderBy('id', 'desc');



        //Search Box Start

        if(!empty(Request::get('id')))
        {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if(!empty(Request::get('country_name')))
        {
            $return = $return->where('country_name', 'like', '%' .Request::get('country_name'). '%');
        }

        if(!empty(Request::get('regions_name')))
        {
            $return = $return->where('regions_name', 'like', '%' .Request::get('regions_name'). '%');
        }


        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date')) )
        {
            $return = $return->where('countries.created_at', '>=', Request::get('start_date'))->where('countries.created_at', '<=', Request::get('end_date'));
        }


        //Search Box END

        $return = $return->paginate(5);
        return $return;

    }


    public function get_regions_name()
    {
        return $this->belongsTo(RegionsModel::class, 'regions_id');

    }

}
