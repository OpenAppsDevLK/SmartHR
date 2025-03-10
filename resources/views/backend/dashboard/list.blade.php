@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{!empty($getEmployeeCount) ? $getEmployeeCount: ''}}</h3>

                <p>Total Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contacts"></i>
              </div>
              <a href="{{url('admin/employees')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{!empty($getHRCount) ? $getHRCount: ''}}</h3>

                <p>Total HR</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contact"></i>
              </div>
              <a href="{{url('admin/employees')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{$getEMPCount}}</h3>

                <p>Employees (None HR)</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('admin/employees')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{!empty($getTotalJobCount) ? $getTotalJobCount: '0'}}</h3>

                <p>Total Jobs</p>
              </div>
              <div class="icon">
                <i class="ion ion-wrench"></i>
              </div>
              <a href="{{url('admin/jobs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{!empty($getTotalJobHisCount) ? $getTotalJobHisCount: ''}}</h3>

                <p>Job History</p>
              </div>
              <div class="icon">
                <i class="ion ion-refresh"></i>
              </div>
              <a href="{{url('admin/job_history')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->  
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{!empty($getTotalRegionsCount) ? $getTotalRegionsCount: ''}}</h3>

                <p>Total Regions</p>
              </div>
              <div class="icon">
                <i class="ion ion-pin"></i>
              </div>
              <a href="{{url('admin/regions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{!empty($getTodayRegionsCount) ? $getTodayRegionsCount: '0'}}</h3>
    
                <p>Today Regions</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
              <a href="{{url('admin/regions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{!empty($getYesterdayRegionsCount) ? $getYesterdayRegionsCount: '0'}}</h3>
    
                <p>Yesterday Regions</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
              <a href="{{url('admin/regions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{!empty($getTotalCountriesCount) ? $getTotalCountriesCount: '0'}}</h3>
    
                <p>Total Countries</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-location"></i>
              </div>
              <a href="{{url('admin/countries')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{!empty($getTotalLocationCount) ? $getTotalLocationCount: '0'}}</h3>
    
                <p>Total Locations</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
              <a href="{{url('admin/locations')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{!empty($getTotalDepCount) ? $getTotalDepCount: '0'}}</h3>

                <p>Total Departments</p>
              </div>
              <div class="icon">
                <i class="ion ion-wrench"></i>
              </div>
              <a href="{{url('admin/departments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{!empty($getTotalManagersCount) ? $getTotalManagersCount: '0'}}</h3>
    
                <p>Total Managers</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-contact"></i>
              </div>
              <a href="{{url('admin/manager')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{!empty($getTotalPayrollCount) ? $getTotalPayrollCount: '0'}}</h3>

                <p>Total Payrolls</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="{{url('admin/payroll')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{!empty($getTotalPositionsCount) ? $getTotalPositionsCount: '0'}}</h3>
    
                <p>Total Positions</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
              <a href="{{url('admin/position')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


        </div>
      </div>


        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
  