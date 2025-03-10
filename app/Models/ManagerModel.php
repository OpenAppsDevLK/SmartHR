<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ManagerModel extends Model
{
    use HasFactory;


    protected $table = 'manager';

    static public function getRecord($request)
    {
        $return = self::select('manager.*')
                 ->orderBy('manager.id', 'desc');




            //Job Search  box Start
            //Request is comming from manager/list.blade.php file, and the request will compare with database.
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('id', '=', Request::get('id'));
                }

                if(!empty(Request::get('manager_name')))
                {
                    $return = $return->where('manager.manager_name', 'like', '%' .Request::get('manager_name'). '%');
                }

                if(!empty(Request::get('manager_email')))
                {
                    $return = $return->where('manager.manager_email', 'like', '%' .Request::get('manager_email'). '%');
                }

                if(!empty(Request::get('manager_mobile')))
                {
                    $return = $return->where('manager.manager_mobile', 'like', '%' .Request::get('manager_mobile'). '%');
                }

                if(!empty(Request::get('start_date')) && !empty(Request::get('end_date')) )
                {
                    $return = $return->where('manager.created_at', '>=', Request::get('start_date'))->where('manager.created_at', '<=', Request::get('end_date'));
                }
            //Employee Search box End


            $return =   $return->paginate(5);
            return $return;
    }
    
}
