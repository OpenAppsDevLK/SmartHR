<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DepartmentsModel;
use App\Models\LocationsModel;
use Illuminate\Http\Request;
use App\Exports\DepartmentsExport;
use App\Models\ManagerModel;


class DepartmentsController extends Controller
{
    
    public function index(Request $request)
    {
        $data['getRecord'] = DepartmentsModel::getRecord($request);
        return view('backend.departments.list', $data);
    }

    public function departments_export(Request $request)
    {
        return Excel::download(new DepartmentsExport, 'departments.xlsx');
    }
    

    public function add(Request $request)
    {
        $data['getManager'] = ManagerModel::get();
        $data['getLocation'] = LocationsModel::get();
        return view('backend.departments.add', $data);
    }
    
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'department_name'   => 'required',
            'manager_id'        => 'required',
            'locations_id'      => 'required'
        ]);

        $user = new DepartmentsModel;
        $user->department_name      = trim($request->department_name);
        $user->manager_id           = trim($request->manager_id);
        $user->locations_id         = trim($request->locations_id);
        $user->save();

        return redirect('admin/departments')->with('success', 'Department successfully Added.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function edit($id, Request $request)
    {
        $data['getManager'] = ManagerModel::get();
        $data['getRecord'] = DepartmentsModel::find($id);
        $data['getLocation'] = LocationsModel::get();
        return view('backend.departments.edit', $data);
        
    }


    public function edit_update ($id, Request $request)
    {
        $user = request()->validate([
            'department_name'   => 'required',
            'manager_id'   => 'required',
            'locations_id'   => 'required'
        ]);

        $user = DepartmentsModel::find($id);
        $user->department_name      = trim($request->department_name);
        $user->manager_id           = trim($request->manager_id);
        $user->locations_id         = trim($request->locations_id);
        $user->save();

        return redirect('admin/departments')->with('success', 'Department successfully Updated.');
        // success message  will connect with _message.blade.php file, HTML

    }

    public function delete($id)
    {
        $recordDelete = DepartmentsModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML  
    }

}
