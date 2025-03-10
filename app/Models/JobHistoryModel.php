<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'job_history';

    static public function getRecord($request)
    {
        // $return = self::select('job_history.*')
        //     ->orderBy('id', 'desc')
        //     ->paginate(20);
        // return $return;

/*
>> Purpose: The query aims to retrieve job history records along with the associated user's name and job title.

>> Select Fields: It selects all fields from the job_history table (job_history.*), 
                  the name field from the users table, and the job_title field from the jobs table.

>> Joins:
    It joins the users table to get the name of the user linked to each job history record.
    It joins the jobs table to get the job title linked to each job history record.

>> Ordering: The results are ordered by the id field of the job_history table 
             in descending order to show the most recent records first.
*/
        $return = self::select('job_history.*', 'users.name', 'jobs.job_title', 'users.last_name', 'departments.department_name')
                ->join('users', 'users.id', '=', 'job_history.employee_id')
                ->join('jobs', 'jobs.id', '=', 'job_history.job_id')
                ->join('departments', 'departments.id', '=', 'job_history.department_id')
                ->orderBy('job_history.id', 'desc');

                if(!empty(Request::get('id')))
                {
                    $return = $return->where('job_history.id', '=', Request::get('id'));
                }

                if(!empty(Request::get('employee_name')))
                {
                    $return = $return->where('users.name', 'like', '%' .Request::get('employee_name'). '%');
                }

                if(!empty(Request::get('start_date')))
                {
                    $return = $return->where('job_history.start_date', '=', Request::get('start_date'));
                }

                if(!empty(Request::get('end_date')))
                {
                    $return = $return->where('job_history.end_date', '=', Request::get('end_date'));
                }

                if(!empty(Request::get('job_title')))
                {
                    $return = $return->where('jobs.job_title', 'like', '%' .Request::get('job_title').'%');
                }
                
                if(!empty(Request::get('start_date')) && !empty(Request::get('end_date')) )
                {
                    $return = $return->where('job_history.start_date', '>=', Request::get('start_date'))->where('job_history.end_date', '<=', Request::get('end_date'));
                }


                $return = $return->paginate(5);
                return $return;

    }

    public function get_user_name_single(){
        //Refer: job_history/list.blade.php
        //This will join "User" table "id" with "job_history" table "employee_id"
        return $this->belongsTo(User::class, "employee_id");
    }

    public function get_job_single()
    {
        //Refer: job_history/list.blade.php
        //This will join "Jobs" table "id" with "job_history" table "job_id"
        return $this->belongsTo(JobsModel::class, "job_id");
    }


    public function get_department_name_single()
    {
        //Refer: job_history/list.blade.php
        //This will join "departments" table "id" with "job_history" table "department_id"
        return $this->belongsTo(DepartmentsModel::class, "department_id");
    }
}
