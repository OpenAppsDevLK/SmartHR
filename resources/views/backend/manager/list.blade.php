@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

            <form action="{{ url('admin/manager_export') }}" method="GET">

              <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
              <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

              <a class="btn btn-success" href="{{ url('admin/manager_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))  }}">Excel Export</a>

            </form>
            <br>
            <a href="{{ url('admin/manager/add') }}" class="btn btn-primary">Add Manager</a>
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
                <h3 class="card-title">Search Manager</h3>

              </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">

                      <div class="form-group col-md-1">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Manager Name</label>
                        <input type="text" name="manager_name" value="{{ Request()->manager_name }}" class="form-control" placeholder="Manager Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Manager Email</label>
                        <input type="text" name="manager_email" value="{{ Request()->manager_email }}" class="form-control" placeholder="Manager Email">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Manager Mobile</label>
                        <input type="text" name="manager_mobile" value="{{ Request()->manager_email }}" class="form-control" placeholder="Manager Mobile">
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
                          <a href="{{ url('admin/manager') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>                      



                    </div>
                  </div>
                </form>

            </div>


        {{-- _message.blade.php file, this file contain message HTML code.--}}
        @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Managers List</h3>
              </div>
            

            <div class="card-body p-0 table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Manager Name</th>
                    <th>Manager Email</th>
                    <th>Manager Mobile</th>
                    <th>Create At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                 
                  @forelse ($getRecord as $value )
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->manager_name }}</td>
                    <td>{{ $value->manager_email }}</td>
                    <td>{{ $value->manager_mobile }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                    <td>
                       {{-- <a href="{{ url('admin/manager/view/'. $value->id ) }}" class="class btn btn-info">View</a> --}}
                       <a href="{{ url('admin/manager/edit/'. $value->id) }}" class="class btn btn-primary">Edit</a>
                       <a href="{{ url('admin/manager/delete/'. $value->id ) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
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
