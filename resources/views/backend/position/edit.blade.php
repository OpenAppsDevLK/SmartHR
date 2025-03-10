@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Position</li>
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
                <h3 class="card-title">Edit Position</h3>
              </div>

              <form method="post" action="{{ url('admin/position/edit/'.$getRecord->id) }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Position Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="position_name" value="{{$getRecord->position_name}}" class="form-control" required placeholder="Enter position name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Daily Rate <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="daily_rate" value="{{$getRecord->daily_rate}}" class="form-control" required placeholder="Enter daily rate">
                      </div>
                  </div>       

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Monthly Rate <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="monthly_rate" value="{{$getRecord->monthly_rate}}" class="form-control" required placeholder="Enter monthly rate">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Working days per month <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="working_days_per_month" value="{{$getRecord->working_days_per_month}}" class="form-control" required placeholder="Enter working days per month">
                      </div>
                  </div> 


                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/position') }}" class="btn btn-default">Back</a>
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
