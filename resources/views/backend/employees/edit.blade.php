@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Employees</h3>
              </div>

              <form method="post" action="{{ url('admin/employees/edit/'.$getRecord->id) }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">
                    
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">First Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required placeholder="Enter First Name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Last Name <span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="last_name" value="{{ $getRecord->last_name }}" class="form-control" placeholder="Enter Last Name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Email<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="email" name="email" value="{{ $getRecord->email }}"  class="form-control" required placeholder="Enter Email ID">
                        <span style="color: red;" >{{ $errors->first('email') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Password<span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="password" name="password" value=""  class="form-control" placeholder="Enter password">
                        <span style="color: red;" >{{ $errors->first('password') }}</span>
                        (Leave blank if you are not changing the password.)
                      </div>
                  </div>


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Phone Number<span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="phone_number" value="{{ $getRecord->phone_number }}"  class="form-control" placeholder="Enter Phone Number">
                        <span style="color: red;" >{{ $errors->first('phone_number') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Profile Image<span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="file" name="profile_image" class="form-control" >

                        @if (!empty($getRecord->profile_image))
                                                   
                        {{-- Check if the file is avalable in the path. because if the files remove the path, then it will give a image error.
                        according to prevent this issue, we can use file_exists. --}}
                            @if (file_exists('upload/' . $getRecord->profile_image))
                                <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                                    style="height: 80px; width:80px" alt="Profile Image">
                            @endif
                            
                        @endif

                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Hire Date<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="date" name="hire_date" class="form-control" value="{{ $getRecord->hire_date }}" placeholder="Enter Hire Date">
                        <span style="color: red;" >{{ $errors->first('hire_date') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Job Title<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="job_id" required>
                          

                              {{-- This is a dynamic value comming form EmployeeController --}}
                              @foreach ($getJobs as $value_job )
                              <option {{ ($getRecord->job_id == $value_job->id) ? 'selected' : '' }} value="{{ $value_job->id  }}">{{ $value_job->job_title }}</option>
                              @endforeach

                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Salary <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="salary" value="{{ $getRecord->salary }}" class="form-control" required placeholder="Enter Salary">
                        <span style="color: red;" >{{ $errors->first('salary') }}</span>
                      </div>
                  </div>


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Commission PCT <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="commission_pct" value="{{ $getRecord->commission_pct }}" class="form-control" required placeholder="Enter Commission PCT"> 
                        <span style="color: red;" >{{ $errors->first('commission_pct') }}</span>
                      </div>
                  </div>


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Manager Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select  class="form-control" name="manager_id" required>
                          <option value="">Select Manager Name</option>
                          @foreach ($getManager as $value_m)
                          <option {{($value_m->id == $getRecord->manager_id) ? 'selected' : '' }} value="{{ $value_m->id }}">{{ $value_m-> manager_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Department Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="department_id" required>
                          <option value="">Select Department Name</option>
                          @foreach ($getDepartment as $value_dep)
                          <option  {{($value_dep->id == $getRecord->department_id) ? 'selected' : '' }} value="{{ $value_dep->id }}">{{ $value_dep-> department_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                
                                    
                  {{-- <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Position Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="position_id" required>
                          <option value="">Select Position Name</option>
                          @foreach ($getPosition as $value_position)
                          <option  {{($value_position->id == $getRecord->position_id) ? 'selected' : '' }} value="{{ $value_position->id }}">{{ $value_dep->department_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div> --}}


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Position Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="position_id" required>
                          
                          <option value="">Select Position Name</option>
                          @foreach ($getPosition as $value_position)
                          <option  {{($value_position->id == $getRecord->position_id) ? 'selected' : '' }} value="{{ $value_position->id }}">{{ $value_position->position_name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                  </div>


                                 <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Interview<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="interview" required>
                          
                          <option value="">Select Interview</option>
                         
                          <option {{ ($getRecord->interview == '0') ? 'selected' : '' }} value="0">Cancel</option>
                          <option {{ ($getRecord->interview == '1') ? 'selected' : '' }} value="1">Peinding</option>
                          <option {{ ($getRecord->interview == '2') ? 'selected' : '' }} value="2">Completed</option>

                        </select>
                      </div>
                  </div>
                  
                </div> 

                
                <div class="card-footer">
                    
                  <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                  <button type="submit" class="btn btn-primary float-right">Update</button>
             
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  
 
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
