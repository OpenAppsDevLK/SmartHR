<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PayrollModel extends Model
{
    use HasFactory;
    protected $table = 'payroll';

    static public function getRecord()
    {
        // $return = self::select('payroll.*')
        // ->orderBy('id', 'desc')
        // ->paginate(5);
        // return $return;

        $return = self::select('payroll.*', 'users.name')
                ->join('users', 'users.id', '=', 'payroll.employee_id')
                ->orderBy('payroll.id', 'asc');
                

                 //Search  box Start

                 if(!empty(Request::get('id')))
                 {
                     $return = $return->where('payroll.id', '=', Request::get('id'));
                 }

                 if(!empty(Request::get('employee_id')))
                 {
                     $return = $return->where('users.name', 'like', '%' .Request::get('employee_id'). '%');
                 }

                 if(!empty(Request::get('number_of_day_work')))
                 {
                     $return = $return->where('payroll.number_of_day_work', 'like', '%' .Request::get('number_of_day_work'). '%');
                 }

                 if(!empty(Request::get('bonus')))
                 {
                     $return = $return->where('payroll.bonus', 'like', '%' .Request::get('bonus'). '%');
                 }

                 if(!empty(Request::get('overtime')))
                 {
                     $return = $return->where('payroll.overtime', 'like', '%' .Request::get('overtime'). '%');
                 }

                  //Search  box End

                $return = $return->paginate(5);
        
                return $return;
    }   


    public function get_employee_name()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

}
