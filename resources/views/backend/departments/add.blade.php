@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Departments</li>
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
                <h3 class="card-title">Add Department</h3>
              </div>

              <form method="post" action="{{ url('admin/departments/add') }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">           
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Department Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="department_name" value="{{ old('department_name') }}" class="form-control" required placeholder="Enter Department Name">
                      </div>
                  </div>       

              <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Manager Name (Manager Id)<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="manager_id" id="" class="form-control" required>
                            <option value="">Select Manager Name</option>
                             @foreach ($getManager as $value_manager)
                                <option value="{{$value_manager->id}}">{{$value_manager->manager_name}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Location Name (Locations Id)<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="locations_id" id="" class="form-control" required>
                            <option value="">Select Location Name</option>
                            @foreach ($getLocation as $value) 
                                <option value="{{$value->id}}">{{$value->street_address}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>


                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/departments') }}" class="btn btn-default">Back</a>
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
