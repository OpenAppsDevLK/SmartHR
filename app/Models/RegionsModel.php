<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class RegionsModel extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static public function getRecord($request)
    {
        $return = self::select('regions.*')
            ->orderBy('id', 'desc');
            
            //Search Box Start

            if(!empty(Request::get('id')))
            {
                $return = $return->where('id', '=', Request::get('id'));
            }

            if(!empty(Request::get('regions_name')))
            {
                $return = $return->where('regions_name', 'like', '%' .Request::get('regions_name'). '%');
            }


            //Search Box END


            $return = $return->paginate(5);
        return $return;


    }

}
