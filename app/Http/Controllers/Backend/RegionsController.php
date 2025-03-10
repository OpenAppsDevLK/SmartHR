<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegionsModel;
use Illuminate\Http\Request;




class RegionsController extends Controller
{
    public function index(Request $request)
    {
                            // JobHistoryModel::getRecord: Selcet the getRecord function at the RegionsModel
        $data['getRecord'] = RegionsModel::getRecord($request);
        return view('backend.regions.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.regions.add');
    }

    public function add_post(Request $request)
    {

        $user = request()->validate([
            'regions_name'   => 'required',
        ]);

        $user = new RegionsModel;
        $user->regions_name      = trim($request->regions_name);
        $user->save();

        return redirect('admin/regions')->with('success', 'Region successfully Added.');
        // success message  will connect with _message.blade.php file, HTML
    }

    public function edit($id)
    {
        $data['getRecord'] = RegionsModel::find($id);
        return view('backend.regions.edit', $data);
    }


    public function edit_update($id, Request $request)
    {
        $user = request()->validate([
            'regions_name'   => 'required',
        ]);

        $user = RegionsModel::find($id);
        $user->regions_name      = trim($request->regions_name);
        $user->save();

        return redirect('admin/regions')->with('success', 'Region successfully Updated.');
        // success message  will connect with _message.blade.php file, HTML
    }

    public function delete($id)
    {
        $recordDelete = RegionsModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML
    }
}

