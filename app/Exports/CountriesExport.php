<?php

namespace App\Exports;
use App\Models\CountriesModel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Request;

class CountriesExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    //Collection Method: Fetches job records based on request parameters.
    public function collection(){
        $request = Request::all();
        return CountriesModel::getRecord($request);
    }

    protected $index = 0;

    //Map Method: Customizes the format of each row in the export, including an incrementing index and formatted date.
    public function map($user):array{
            $cretedAtFormat = date('d-m-Y', strtotime($user->created_at));
        return [
            //incrementing index
            ++$this->index,
            $user->id,
            $user->country_name,
            $user->regions_name,
            $cretedAtFormat
        ];
    }

    //Headings Method: Defines the column headings for the export file.
    public function headings():array{
        return[
            'S.No',
            'Table ID',
            'Country Name',
            'Region Name',
            'Create At'
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
