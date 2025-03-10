@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                <h3 class="card-title">Add Employees</h3>
              </div>

              <form method="post" accept="{{ url('admin/employees/add') }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">First Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Enter First Name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Last Name <span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Enter Last Name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Email<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="email" name="email" value="{{ old('email') }}"  class="form-control" required placeholder="Enter Email ID">
                        <span style="color: red;" >{{ $errors->first('email') }}</span>
                      </div>
                  </div>


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Password<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="password" name="password" value=""  class="form-control" required placeholder="Enter password">
                        <span style="color: red;" >{{ $errors->first('password') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Phone Number<span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}"  class="form-control" placeholder="Enter Phone Number">
                        <span style="color: red;" >{{ $errors->first('phone_number') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Profile Image<span style="color: red;"></span></lable>
                      <div class="col-sm-10">
                        <input type="file" name="profile_image" class="form-control" >
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Hire Date<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date') }}" placeholder="Enter Hire Date">
                        <span style="color: red;" >{{ $errors->first('hire_date') }}</span>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Job Title<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="job_id" required>
                          <option value="">Select Job Title</option>

                          {{-- This is a dynamic value comming form EmployeeController --}}
                          @foreach ($getJobs as $value_job )
                          <option value="{{ $value_job->id  }}">{{ $value_job->job_title }}</option>
                          @endforeach

                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Salary <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" required placeholder="Enter Salary">
                        <span style="color: red;" >{{ $errors->first('salary') }}</span>
                      </div>
                  </div>



                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Commission PCT <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="commission_pct" value="{{ old('commission_pct') }}" class="form-control" required placeholder="Enter Commission PCT">
                        <span style="color: red;" >{{ $errors->first('commission_pct') }}</span>
                      </div>
                  </div>


                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Manager Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select  class="form-control" name="manager_id" required>
                          <option value="">Select Manager Name</option>

                          @foreach ($getManager as $value_m)
                          <option value="{{ $value_m->id }}">{{ $value_m-> manager_name}}</option>
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
                          <option value="{{ $value_dep->id }}">{{ $value_dep->department_name}}</option>
                          @endforeach

                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Position Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select class="form-control" name="position_id" required>

                          <option value="">Select Position Name</option>
                          @foreach ($getPosition as $value_position)
                          <option value="{{ $value_position->id }}">{{ $value_position->position_name}}</option>
                          @endforeach

                        </select>
                      </div>
                  </div>

                </div>

                  <div class="card-footer">

                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Add</button>
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
