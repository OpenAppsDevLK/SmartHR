<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PositionModel extends Model
{
    use HasFactory;
    protected $table = 'position';


    static public function getRecord($request){

        $return = self::select('position.*')
                        ->orderBy('id', 'desc');



                //Search  box Start

                 if(!empty(Request::get('id')))
                 {
                     $return = $return->where('position.id', '=', Request::get('id'));
                 }

                 if(!empty(Request::get('position_name')))
                 {
                     $return = $return->where('position.position_name', 'like', '%' .Request::get('position_name'). '%');
                 }

                 if(!empty(Request::get('daily_rate')))
                 {
                     $return = $return->where('position.daily_rate', 'like', '%' .Request::get('daily_rate'). '%');
                 }

                 if(!empty(Request::get('monthly_rate')))
                 {
                     $return = $return->where('position.monthly_rate', 'like', '%' .Request::get('monthly_rate'). '%');
                 }

                 if(!empty(Request::get('working_days_per_month')))
                 {
                     $return = $return->where('position.working_days_per_month', 'like', '%' .Request::get('working_days_per_month'). '%');
                 }

                  //Search  box End


                        $return = $return->paginate(5);
        return $return;


    }
}
