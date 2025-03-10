<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PositionModel;
use Illuminate\Http\Request;


class PositionController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = PositionModel::getRecord($request);
        return view('backend.position.list', $data);
    }


    public function add(Request $request)
    {
        return view('backend.position.add');
    }


    public function insert_add(Request $request)
    {
        $user = request()->validate([
            'position_name'             => 'required',
            'daily_rate'                => 'required',
            'monthly_rate'              => 'required',
            'working_days_per_month'    => 'required'
            
        ]);

        $user = new PositionModel;
        $user->position_name             = trim($request->position_name);
        $user->daily_rate                = trim($request->daily_rate);
        $user->monthly_rate              = trim($request->monthly_rate);
        $user->working_days_per_month    = trim($request->working_days_per_month);
        $user->save();

        return redirect('admin/position')->with('success', 'Position successfully Added.');
        // success message  will connect with _message.blade.php file, HTML
    }

    public function edit($id)
    {
        $data['getRecord'] = PositionModel::find($id);
        return view('backend.position.edit', $data);
    }


    public function edit_update($id, Request $request)
    {

        $user = PositionModel::find($id);
        $user->position_name             = trim($request->position_name);
        $user->daily_rate                = trim($request->daily_rate);
        $user->monthly_rate              = trim($request->monthly_rate);
        $user->working_days_per_month    = trim($request->working_days_per_month);
        $user->save();

        return redirect('admin/position')->with('success', 'Position successfully Updated.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function delete($id)
    {
        $recordDelete = PositionModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML        
    }
}
