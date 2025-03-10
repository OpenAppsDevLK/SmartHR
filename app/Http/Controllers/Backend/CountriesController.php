<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CountriesModel;
use App\Models\RegionsModel;
use Illuminate\Http\Request;
use App\Exports\CountriesExport;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
                            // JobHistoryModel::getRecord: Selcet the getRecord function at the RegionsModel
        $data['getRecord'] = CountriesModel::getRecord($request);
        //$data['getRecord'] = RegionsModel::getRecord($request);
        return view('backend.countries.list', $data);
    }


    public function countries_export(Request $request)
    {
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }




    public function add(Request $request)
    {
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.add', $data);
    }


    public function add_post(Request $request)
    {
        $user = request()->validate([
            'country_name'   => 'required',
            'regions_id'   => 'required'
        ]);

        $user = new CountriesModel;
        $user->country_name      = trim($request->country_name);
        $user->regions_id      = trim($request->regions_id);
        $user->save();

        return redirect('admin/countries')->with('success', 'Country successfully Added.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function edit($id)
    {
        $data['getRecord'] = CountriesModel::find($id);
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.edit', $data);

    }


    public function edit_update($id, Request $request)
    {
        $user = request()->validate([
            'country_name'   => 'required',
            'regions_id'   => 'required'
        ]);

        $user = CountriesModel::find($id);
        $user->country_name      = trim($request->country_name);
        $user->regions_id      = trim($request->regions_id);
        $user->save();

        return redirect('admin/countries')->with('success', 'Country successfully Updated.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function delete($id)
    {
        $recordDelete = CountriesModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML  
    }



}

