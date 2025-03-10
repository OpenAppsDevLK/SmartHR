<?php

namespace App\Exports;
use App\Models\JobHistoryModel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Request;

class JobHistoryExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    //Collection Method: Fetches job records based on request parameters.
    public function collection(){
        $request = Request::all();
        return JobHistoryModel::getRecord($request);
    }

    protected $index = 0;

    //Map Method: Customizes the format of each row in the export, including an incrementing index and formatted date.
    public function map($user):array{
        $startDate = date('d-m-Y', strtotime($user->start_date));
        $endDate = date('d-m-Y', strtotime($user->end_date));
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));

        // if($user->department_id == 1){
        //     $department = 'HRM Dep';
        // }else{
        //     $department = 'IT Dep';
        // }


        return[
            $user->id,
            $user->name.' '.$user->last_name,
            $startDate,
            $endDate,
            $user->job_title,
            $user->department_name,
            $createdAtFormat


        ];
    }

    //Headings Method: Defines the column headings for the export file.
    public function headings():array{
        return[
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job Title',
            'Department ID',
            'Created at'
        ];
    }
}

//Export Jobs as a Excel file

//Step-01:
//Install Laravel Excel class, usning this command
//composer require maatwebsite/excel   or   composer require maatwebsite/excel --ignore-platform-req=ext-gd

//Step-02:
//Add the following lines to config/app.php file
//After the line no 170 or in the 'providers' section: Maatwebsite\Excel\ExcelServiceProvider::class,
//Add this code in the Class Aliases section: 'Excel' => Maatwebsite\Excel\Facades\Excel::class,

//Step-03:
//Add the form with button [Export Excel] on list.blade.php file

//Step-04:
//Register a route at web.php and add a jobs_export function on the JobController.

//Step-04:
//Create a new folder and a file at app/Exports/JobsExport.php
