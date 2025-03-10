@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

            <form action="{{ url('admin/job_history_export') }}" method="GET">

              <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
              <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

              <a class="btn btn-success" href="{{ url('admin/job_history_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))  }}">Excel Export</a>

            </form>
            <br>
            <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary">Add Job History</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">

            <fiv class="card">
              <div class="card-header">
                <h3 class="card-title">Search Jobs History List</h3>
              </div>

              <form action="" method="get">
                <div class="card-body">
                  <div class="row">
                  
                      <div class="form-group col-md-1">
                        <label for="">ID</label>            {{-- This will show, entered value in the filed after the submit the form --}}
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>
                                                        
                      <div class="form-group col-md-2">
                        <label for="">Employee Name</label>
                        <input type="text" name="employee_name" value="{{ Request()->employee_name }}" class="form-control" placeholder="Employee Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control" >
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Job Title</label>
                        <input type="text" name="job_title" value="{{ Request()->job_title }}" class="form-control" placeholder="Job Title">
                      </div>

                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{ url('admin/job_history') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>   
                  </div>

                </div>
              </form>
            </fiv>


            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jobs History List</h3>
              </div>

              <div class="card-body p-0 table-responsive">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th>ID</th> 
                      <th>Employee Name (Employee ID)</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Job Name (Job_ID)</th>
                      <th>Department Name (Department ID)</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
  
  
                   
                    @forelse ($getRecord as $value )
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        {{ !empty($value->get_user_name_single->name) ? $value->get_user_name_single->name : '' }}
                        {{ !empty($value->get_user_name_single->last_name) ? $value->get_user_name_single->last_name : '' }}  
                      </td>
                      <td>{{ $value->start_date }}</td>
                      <td>{{ $value->end_date }}</td>
                      <td>{{ !empty($value->get_job_single->job_title) ? $value->get_job_single->job_title : '' }}</td>
                      <td>
                        {{ !empty($value->get_department_name_single->department_name) ? $value->get_department_name_single->department_name : '' }}
                      </td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                         {{-- <a href="{{ url('admin/jobs/view/'  ) }}" class="class btn btn-info">View</a> --}}
                         <a href="{{ url('admin/job_history/edit/'.$value->id ) }}" class="class btn btn-primary">Edit</a>
                         <a href="{{ url('admin/job_history/delete/'.$value->id ) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  
                    @empty
                    <tr>
                      <td colspan="100%">No Record Found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                
                <div style="padding: 10px; float: right;">
                  {{-- This is the pagination code. you have to fix the pagination on AppServiceProvider.php file. --}}
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  
                </div>
  
              </div>              
            </div>

          </section>


        </div>
      </div>
    </section>
 
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
