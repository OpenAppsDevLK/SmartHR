@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

            <form action="{{ url('admin/departments_export') }}" method="GET">

              <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
              <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

              <a class="btn btn-success" href="{{ url('admin/departments_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))  }}">Excel Export</a>

            </form>
            <br>
            <a href="{{ url('admin/departments/add') }}" class="btn btn-primary">Add Department</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Departments</h3>

              </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">

                      <div class="form-group col-md-1">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Department Name</label>
                        <input type="text" name="department_name" value="{{ Request()->department_name }}" class="form-control" placeholder="Enter Department Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Location Name</label>
                        <input type="text" name="street_address" value="{{ Request()->street_address }}" class="form-control" placeholder="Enter Location Name">
                      </div>


                      <div class="form-group col-md-2">
                        <label for="">From Date (Start Date)</label>            
                        <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">To date (End Date)</label>            
                        <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control">
                      </div>

                      <div class="form-group col-md-3">
                          <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                          <a href="{{ url('admin/departments') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>                      



                    </div>
                  </div>
                </form>

            </div>


        {{-- _message.blade.php file, this file contain message HTML code.--}}
        @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department List</h3>
              </div>
            

            <div class="card-body p-0 table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Manager Name</th>
                    <th>Location Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                 
                   @forelse ($getRecord as $value )
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->department_name}}</td>
                    <td>{{$value->manager_name}}</td>
                    <td>{{$value->street_address}}</td>
                    <td>{{ date('Y-m-d H:i A', strtotime($value->created_at)) }}</td> 
                    <td>
                       <a href="{{ url('admin/departments/edit/'. $value->id) }}" class="class btn btn-primary">Edit</a>
                       <a href="{{ url('admin/departments/delete/'. $value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
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
