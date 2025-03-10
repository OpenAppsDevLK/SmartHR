@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

              {{-- <a class="btn btn-success" href="{{ url('admin/position_export')}}">Excel Export</a> --}}
              
            <a href="{{ url('admin/position/add') }}" class="btn btn-primary">Add Position</a>
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
                <h3 class="card-title">Search Position List</h3>
              </div>

              <form action="" method="get">
                <div class="card-body">
                  <div class="row">
                  
                      <div class="form-group col-md-1">
                        <label for="">ID</label>            {{-- This will show, entered value in the filed after the submit the form --}}
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>
                                                        
                      <div class="form-group col-md-2">
                        <label for="">Position Name</label>
                        <input type="text" name="position_name" value="{{ Request()->position_name }}"  class="form-control" placeholder="Position Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Daily Rate</label>
                        <input type="text" name="daily_rate" value="{{ Request()->daily_rate }}"  class="form-control" placeholder="Daily Rate">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Monthly Rate</label>
                        <input type="text" name="monthly_rate" value="{{ Request()->monthly_rate }}"  class="form-control" placeholder="Monthly Rate">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Working days per month</label>
                        <input type="text" name="working_days_per_month" value="{{ Request()->working_days_per_month }}"  class="form-control" placeholder="Working days per month">
                      </div>

                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{ url('admin/position') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>   
                  </div>

                </div>
              </form>
            </fiv>


            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Position List</h3>
              </div>

              <div class="card-body p-0 table-responsive">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th>ID</th> 
                      <th>Position Name</th>
                      <th>Daily Rate</th>
                      <th>Monthly Rate</th>
                      <th>Working days per month</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                     @forelse ($getRecord as $value )


                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->position_name }}</td>
                      <td>{{ $value->daily_rate }}</td>
                      <td>{{ $value->monthly_rate }}</td>
                      <td>{{ $value->working_days_per_month }}</td>
                      <td>{{ date('Y-m-d  H:s:i', strtotime($value->created_at)) }}</td>
                      <td>{{ date('Y-m-d  H:s:i', strtotime($value->updated_at)) }}</td>
                      <td>
                         <a href="{{ url('admin/position/edit/'.$value->id ) }}" class="class btn btn-primary">Edit</a>
                         <a href="{{ url('admin/position/delete/'.$value->id ) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
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
