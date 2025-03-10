<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CountriesModel;
use App\Models\LocationsModel;
use Illuminate\Http\Request;
use App\Exports\LocationsExport;




class LocationsController extends Controller
{
    public function index(Request $request)
    {
                            // JobHistoryModel::getRecord: Selcet the getRecord function at the RegionsModel
        $data['getRecord'] = LocationsModel::getRecord($request);
        return view('backend.location.list', $data);
    }

    public function locations_export(Request $request)
    {
        return Excel::download(new LocationsExport, 'locations.xlsx');
    }


    public function add(Request $request)
    {
        $data['getCountries'] = CountriesModel::get();
        return view('backend.location.add', $data);
    }


    public function add_post(Request $request)
    {
        //dd($request->all());

        $user = request()->validate([
            'street_address'    => 'required',
            'postal_code'       => 'required',
            'city'              => 'required',
            'state_provice'     => 'required',
            'countries_id'      => 'required'
        ]);

        $user = new LocationsModel;
        $user->street_address      = trim($request->street_address);
        $user->postal_code         = trim($request->postal_code);
        $user->city                = trim($request->city);
        $user->state_provice       = trim($request->state_provice);
        $user->countries_id         = trim($request->countries_id);
        $user->save();

        return redirect('admin/locations')->with('success', 'Location successfully Added.');
        // success message  will connect with _message.blade.php file, HTML

    }


    public function edit($id)
    {
        $data['getRecord'] = LocationsModel::find($id);
        $data['getCountries'] = CountriesModel::get();
        return view('backend.location.edit', $data);
    }


    public function edit_update($id, Request $request)
    {

        $user = LocationsModel::find($id);
        $user->street_address       = trim($request->street_address);
        $user->postal_code          = trim($request->postal_code);
        $user->city                 = trim($request->city);
        $user->state_provice        = trim($request->state_provice);
        $user->countries_id         = trim($request->countries_id);
        $user->save();

        return redirect('admin/locations')->with('success', 'Location successfully Updated.');
        // success message  will connect with _message.blade.php file, HTML
    }


    public function delete($id)
    {
        $recordDelete = LocationsModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML 
    }




}
