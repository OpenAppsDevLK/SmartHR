@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

            <form action="{{ url('admin/locations_export') }}" method="GET">

              <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
              <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

              <a class="btn btn-success" href="{{ url('admin/locations_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))  }}">Excel Export</a>

            </form>
            <br>
            <a href="{{ url('admin/locations/add') }}" class="btn btn-primary">Add Location</a>
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
                <h3 class="card-title">Search Locations</h3>

              </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">

                      <div class="form-group col-md-1">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Street Address</label>
                        <input type="text" name="street_address" value="{{ Request()->street_address }}" class="form-control" placeholder="Enter Street Address">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Postal Code</label>
                        <input type="text" name="postal_code" value="{{ Request()->postal_code }}" class="form-control" placeholder="Enter Postal Code">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">City</label>
                        <input type="text" name="city" value="{{ Request()->city }}" class="form-control" placeholder="Enter City">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">State Provice</label>
                        <input type="text" name="state_provice" value="{{ Request()->state_provice }}" class="form-control" placeholder="Enter State Provice">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Country Name</label>
                        <input type="text" name="countries_name" value="{{ Request()->countries_name }}" class="form-control" placeholder="Enter Country Name">
                      </div>
                      
                      <div class="form-group col-md-2">
                        <label for="">Created At</label>
                        <input type="date" name="created_at" value="{{ Request()->created_at }}" class="form-control">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Updated At</label>
                        <input type="date" name="updated_at" value="{{ Request()->updated_at }}" class="form-control">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">From Date (Start Date)</label>
                        <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">To Date (End Date)</label>
                        <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control">
                      </div>

                      <div class="form-group col-md-3">
                          <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                          <a href="{{ url('admin/locations') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>                      



                    </div>
                  </div>
                </form>

            </div>


        {{-- _message.blade.php file, this file contain message HTML code.--}}
        @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Location List</h3>
              </div>
            

            <div class="card-body p-0 table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Street Address</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>State Provice</th>
                    <th>Country Name</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                 
                  @forelse ($getRecord as $value )
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->street_address}}</td>
                    <td>{{$value->postal_code}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state_provice}}</td>
                    <td>{{$value->country_name}}</td>
                    <td>{{ date('Y-m-d H:i A', strtotime($value->created_at)) }}</td> 
                    <td>{{ date('Y-m-d H:i A', strtotime($value->updated_at)) }}</td> 
                    <td>
                       {{-- <a href="{{ url('admin/jobs/view/'. $value->id) }}" class="class btn btn-info">View</a> --}}
                       <a href="{{ url('admin/locations/edit/'. $value->id) }}" class="class btn btn-primary">Edit</a>
                       <a href="{{ url('admin/locations/delete/'. $value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
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
