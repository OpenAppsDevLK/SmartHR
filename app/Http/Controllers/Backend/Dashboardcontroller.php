<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\JobHistoryModel;
use App\Models\RegionsModel;
use Carbon\Carbon;
use App\Models\CountriesModel;
use App\Models\LocationsModel;
use App\Models\DepartmentsModel;
use App\Models\ManagerModel;
use App\Models\PayrollModel;
use App\Models\PositionModel;
use Auth;






class Dashboardcontroller extends Controller
{
    public function dashboard(Request $request) 
    {

        if(Auth::user()->is_role == 1){

        $data['getEmployeeCount'] = User::count();
        $data['getHRCount'] = User::where('is_role', '=', 1)->count();
        $data['getEMPCount'] = User::where('is_role', '=', 0)->count();
        
        $data['getTotalJobCount'] = JobsModel::count();
        $data['getTotalJobHisCount'] = JobHistoryModel::count();
        $data['getTotalRegionsCount'] = RegionsModel::count();
        $data['getTodayRegionsCount'] = RegionsModel::whereDate('created_at', carbon::today())->count();
        $data['getYesterdayRegionsCount'] = RegionsModel::whereDate('created_at', carbon::yesterday())->count();
        $data['getTotalCountriesCount'] = CountriesModel::count();
        $data['getTotalLocationCount'] = LocationsModel::count();
        $data['getTotalDepCount'] = DepartmentsModel::count();
        $data['getTotalManagersCount'] = ManagerModel::count();
        $data['getTotalPayrollCount'] = PayrollModel::count();
        $data['getTotalPositionsCount'] = PositionModel::count();

        return view('backend.dashboard.list', $data);

    }else if (Auth::user()->is_role == 0){
        return view('backend.employee.dashboard.list');
    }
    }
}
