@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Regions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/regions/add') }}" class="btn btn-primary">Add Region</a>
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
                <h3 class="card-title">Search Regions</h3>

              </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">

                      <div class="form-group col-md-1">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Regions Name</label>
                        <input type="text" name="regions_name" value="{{ Request()->regions_name }}" class="form-control" placeholder="Enter Regions Name">
                    </div>
                     

                      <div class="form-group col-md-3">
                          <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                          <a href="{{ url('admin/regions') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>                      



                    </div>
                  </div>
                </form>

            </div>


        {{-- _message.blade.php file, this file contain message HTML code.--}}
        @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Region List</h3>
              </div>
            

            <div class="card-body p-0 table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Regions Name</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                 
                   @forelse ($getRecord as $value )
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->regions_name }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td> 
                    <td>
                       <a href="{{ url('admin/regions/edit/'. $value->id) }}" class="class btn btn-primary">Edit</a>
                       <a href="{{ url('admin/regions/delete/'. $value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
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
