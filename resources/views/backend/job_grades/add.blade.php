@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job Grades</li>
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
                <h3 class="card-title">Add Job Grades</h3>
              </div>

              <form method="post" action="{{ url('admin/job_grades/add') }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">
              
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Grade Level <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="grade_level" value="{{ old('grade_level') }}" class="form-control" required  placeholder="Enter Job Grade Level">
                      </div>
                  </div>       

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Lowest Salary <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="lowest_sal" value="{{ old('lowest_sal') }}" class="form-control" required  placeholder="Enter Lowest Salary">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Highest Salary <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="highest_sal" value="{{ old('highest_sal') }}" class="form-control" required  placeholder="Enter Highest Salary">
                      </div>
                  </div> 


                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/job_grades') }}" class="btn btn-default">Back</a>
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
