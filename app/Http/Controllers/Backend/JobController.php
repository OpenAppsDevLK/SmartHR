<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class JobController extends Controller
{
    public function index(Request $request)
    {
                             // JobsModel::getRecord: Selcet the getRecord function at the JobsModel
        $data['getRecord'] = JobsModel::getRecord($request);
        return view('backend.jobs.list', $data);
    }


    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }

    public function add()
    {
        return view('backend.jobs.add');
    }

    public function add_post(Request $request)
    {
        //dd($request->all());

        //Check and validate the user inputs on HTML Form
        $user = request()->validate([

            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'

        ]);

        $user = new JobsModel;
        $user->job_title = trim($request->job_title);
        $user->min_salary = trim($request->min_salary);
        $user->max_salary = trim($request->max_salary);
        $user->save();

        return redirect('admin/jobs')->with('success', 'Job successfully Added.');
        // success message  will connect with _message.blade.php file, HTML

    }


    public function view($id, Request $request)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.view', $data);
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.edit', $data);
    }

    public function edit_update($id, Request $request)
    {

        //Check and validate the user inputs on HTML Form
        $user = request()->validate([

            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'

        ]);

        $user = JobsModel::find($id);

        $user->job_title = trim($request->job_title);
        $user->min_salary = trim($request->min_salary);
        $user->max_salary = trim($request->max_salary);
        $user->save();

        return redirect('admin/jobs')->with('success', 'Job successfully Update.');
        // success message  will connect with _message.blade.php file, HTML
    }

    public function delete($id)
    {
        
        $recordDelete = JobsModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML
    }



}
