<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ManagerModel;
use Illuminate\Http\Request;
use App\Exports\ManagerExport;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
                                    // JobHistoryModel::getRecord: Selcet the getRecord function at the RegionsModel
        $data['getRecord'] = ManagerModel::getRecord($request);
        return view('backend.manager.list', $data);
    }

    public function manager_export(Request $request)
    {
        return Excel::download(new ManagerExport, 'managers.xlsx');
    }


    public function add()
    {
        return view('backend.manager.add');
    }


    public function add_post(Request $request)
    {
        $user = request()->validate([
            'manager_name'      => 'required',
            'manager_email'     => 'required',
            'manager_mobile'    => 'required'
        ]);

        $user = new ManagerModel;
        $user->manager_name      = trim($request->manager_name);
        $user->manager_email     = trim($request->manager_email);
        $user->manager_mobile    = trim($request->manager_mobile);
        $user->save();

        return redirect('admin/manager')->with('success', 'Manager successfully Added.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function edit ($id, Request $request)
    {
        $data['getRecord'] = ManagerModel::find($id);
        return view('backend.manager.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
                //Check and validate the user inputs on HTML Form
                $user = request()->validate([

                    'manager_name'      => 'required',
                    'manager_email'     => 'required',
                    'manager_mobile'    => 'required'
        
                ]);
        
                $user = ManagerModel::find($id);
        
                $user->manager_name = trim($request->manager_name);
                $user->manager_email = trim($request->manager_email);
                $user->manager_mobile = trim($request->manager_mobile);
                $user->save();
        
                return redirect('admin/manager')->with('success', 'Manager Details successfully Updated.');
                // success message  will connect with _message.blade.php file, HTML
    }

    public function delete($id)
    {
        $recordDelete = ManagerModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML
    }
}
