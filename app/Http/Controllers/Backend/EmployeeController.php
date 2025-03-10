<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\JobsModel;
use App\Models\ManagerModel;
use App\Models\DepartmentsModel;
use App\Models\PositionModel;

//-----For Password--------------
use Hash;

//-----For file uploading---------
use Str;
use File;

//-----eMail-----------------------
use Mail;
use App\Mail\EmployeesNewCreateMail;
//Create a Mail folder in the App folder. and create a file EmployeesNewCreateMail.php.


class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }


    public function image_delete($id, Request $request)
    {
        //echo $id; die();
        $deleteProfileImage = User::find($id);
        $deleteProfileImage->profile_image = $request->profile_image;
        $deleteProfileImage->save();
        
        return redirect()->back()->with('error', 'Image Deleted successfully.'); 
    }


    public function add(Request $request)
    {
        
        $data['getPosition'] = PositionModel::get();
        $data['getManager'] = ManagerModel::get();
        $data['getDepartment'] = DepartmentsModel::get();
        $data['getJobs'] = JobsModel::get(); //This is a dynamic value, send to employee/add.blade.php for select option drop-down list.
        return view('backend.employees.add', $data);
    }

    public function add_post(Request $request)
    {
        //dd($request->all());

        //Check and validate the user inputs on HTML Form
        $user = request()->validate([

            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'phone_number' => 'required|numeric',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
            'position_id' => 'required'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0; //0 - Employee

        
        $rendome_password = $request->password;

        $user->password = Hash::make($rendome_password);

        if(!empty($request->file('profile_image'))){
            $file       = $request->file('profile_image');
            $randomStr  = Str::random(30);
            $filename   = $randomStr. '.' .$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $user->profile_image    = $filename;
        }


        $user->save();
        $user->rendome_password = $rendome_password;

        //Sending Mail-------------------------------

        Mail::to($user->email)->send(new EmployeesNewCreateMail($user));   


        //-------------------------------------------

        return redirect('admin/employees')->with('success', 'Employees successfully register.');
        // success message  will connect with _message.blade.php file, HTML

    }


    public function view($id)
    {
        //echo $id; die();

        //Passing the data to the view
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id)
    {
        $data['getPosition'] = PositionModel::get();
        $data['getManager'] = ManagerModel::get();
        $data['getDepartment'] = DepartmentsModel::get();
        $data['getJobs'] = JobsModel::get(); //This is a dynamic value, send to employee/edit.blade.php for select option drop-down list.
        //Passing the data to the view
        $data['getRecord'] = User::find($id);
        return view('backend.employees.edit', $data);
    }


    public function edit_update($id, Request $request)
    {

        //Check and validate the user inputs on HTML Form
        $user = request()->validate([

            'email' => 'required|unique:users,email,'.$id
        ]);


        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0; //0 - Employee
        $user->	interview = $request->interview;

        if(!empty($request->password)){
            $user->password  =    Hash::make($request->password);
        }

       

        if(!empty($request->file('profile_image'))){
            if(!empty($user->profile_image) && file_exists('upload/'.$user->profile_image))
            {
                unlink('upload/'.$user->profile_image);
            }
           
            
            $file       = $request->file('profile_image');
            $randomStr  = Str::random(30);
            $filename   = $randomStr. '.' .$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $user->profile_image    = $filename;
        }

        $user->save();

        return redirect('admin/employees')->with('success', 'Employees successfully Updatered.');
        // success message  will connect with _message.blade.php file, HTML

    }

    public function delete($id)
    {

        
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record successfully deleted');
        // success (error) message  will connect with _message.blade.php file, HTML
    }



}
