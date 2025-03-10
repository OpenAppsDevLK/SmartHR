@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job History</li>
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
                <h3 class="card-title">Add History</h3>
              </div>

              <form method="post" action="{{ url('admin/job_history/add') }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Employee Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="employee_id" id="" class="form-control">
                            <option value="">Select Employee Name</option>
                            @foreach ($getEmployee as $value_employee)
                                <option value="{{ $value_employee->id }}">{{ $value_employee->name }} {{$value_employee->last_name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>                
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Start Date <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control" required >
                      </div>
                  </div>       

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">End Date <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" required>
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Job Name (Job ID) <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="job_id" id="" class="form-control">
                            <option value="">Select Job Name</option>
                            @foreach ($getJobs as $value_job)
                                <option value="{{ $value_job->id }}">{{ $value_job-> job_title}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Department Name (Department ID)<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="department_id" id="" class="form-control">
                            <option value="">Select Department Name</option>
                            @foreach ($getDepartments as $value_d)
                            <option value="{{$value_d->id}}">{{$value_d->department_name}}</option>
                            @endforeach
                            

                        </select>
                      </div>
                  </div>


                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/job_history') }}" class="btn btn-default">Back</a>
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
