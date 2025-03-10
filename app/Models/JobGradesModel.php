<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobGradesModel extends Model
{
    use HasFactory;
    protected $table = 'job_grades';


    static public function getRecord($request)
    {
        // $return = self::select('job_grades.*')
        //             ->orderBy('id', 'desc')
        //             ->paginate(5);
        //         return $return;


        $return = self::select('job_grades.*');
        

        //Search Box Start

        if(!empty(Request::get('id')))
        {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if(!empty(Request::get('grade_level')))
        {
            $return = $return->where('grade_level', 'like', '%' .Request::get('grade_level'). '%');
        }

        if(!empty(Request::get('lowest_sal')))
        {
            $return = $return->where('lowest_sal', 'like', '%' .Request::get('lowest_sal'). '%');
        }

        if(!empty(Request::get('highest_sal')))
        {
            $return = $return->where('highest_sal', 'like', '%' .Request::get('highest_sal'). '%');
        }        
        
        //Search Box END

        $return = $return->orderBy('id', 'desc')
                          ->paginate(5);
                    return $return;



    }
}
