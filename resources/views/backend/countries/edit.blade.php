@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Countries</li>
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
                <h3 class="card-title">Update Countries</h3>
              </div>

              <form method="post" action="{{ url('admin/countries/edit/'.$getRecord->id) }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">
              
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Country Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="country_name" value="{{$getRecord->country_name}}" class="form-control" required  placeholder="Enter Country Name">
                      </div>
                  </div>        

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Regions Name<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select  class="form-control" name="regions_id" required>

                          <option value="">Select Region</option>
                          
                          @foreach ($getRegions as $value)
                          <option value="{{$value->id}}"{{($value->id == $getRecord->regions_id) ? 'selected' : ''}} >{{$value->regions_name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                  </div>

                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/countries') }}" class="btn btn-default">Back</a>
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
