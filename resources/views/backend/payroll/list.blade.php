@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PayRoll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

              <a class="btn btn-success" href="{{ url('admin/payroll_export')}}">Excel Export</a>
              
            <a href="{{ url('admin/payroll/add') }}" class="btn btn-primary">Add PayRoll</a>
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
                <h3 class="card-title">Search PayRoll List</h3>
              </div>

              <form action="" method="get">
                <div class="card-body">
                  <div class="row">
                  
                      <div class="form-group col-md-1">
                        <label for="">ID</label>            {{-- This will show, entered value in the filed after the submit the form --}}
                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                      </div>
                                                        
                      <div class="form-group col-md-2">
                        <label for="">Employee Name</label>
                        <input type="text" name="employee_id" value="{{ Request()->employee_id }}" class="form-control" placeholder="Employee Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Number of day work</label>
                        <input type="text" name="number_of_day_work" value="{{ Request()->number_of_day_work }}" class="form-control" placeholder="Enter Number of day work">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Bonus</label>
                        <input type="text" name="bonus" value="{{ Request()->bonus }}" class="form-control" placeholder="Enter Bonus">
                      </div>

                      <div class="form-group col-md-2">
                        <label for="">Overtime</label>
                        <input type="text" name="overtime" value="{{ Request()->overtime }}" class="form-control" placeholder="Enter overtime">
                      </div>

                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{ url('admin/payroll') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>   
                  </div>

                </div>
              </form>
            </fiv>


            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">PayRoll List</h3>
              </div>

              <div class="card-body p-0 table-responsive">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th>ID</th> 
                      <th>Employee Name</th>
                      <th>Number of day Work</th>
                      <th>Bonus</th>
                      <th>Overtime</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
  
                    @php
                    $totalNumbOfDaysWork = 0;
                      $totalBonus = 0;
                      $totalOvertime = 0;
                    @endphp
                    
  
                   
                     @forelse ($getRecord as $value )

                     @php
                       $totalBonus = $totalBonus + $value->bonus;
                       $totalNumbOfDaysWork = $totalNumbOfDaysWork + $value->number_of_day_work;
                       $totalOvertime = $totalOvertime + $value->overtime;
                     @endphp

                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ !empty ($value->name) ? $value->name: '' }}</td>
                      <td>{{ $value->number_of_day_work }}</td>
                      <td>{{ $value->bonus }}</td>
                      <td>{{ $value->overtime }}</td>
                      <td>
                         <a href="{{ url('admin/payroll/view/'.$value->id  ) }}" class="class btn btn-info">View</a> 
                         <a href="{{ url('admin/payroll/edit/'.$value->id  ) }}" class="class btn btn-primary">Edit</a>
                         <a href="{{ url('admin/payroll/delete/'.$value->id ) }}" onclick="return confirm('Are you sure you want to delete?')" class="class btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  
                   @empty
                    <tr>
                      <td colspan="100%">No Record Found.</td>
                    </tr>
                   @endforelse

                   <tr>
                    <th colspan="2">Total All </th>
                    <td>
                      {{$totalNumbOfDaysWork}}
                    </td>
                    <td>
                      {{$totalBonus}}
                    </td>
                    <td>
                      {{$totalOvertime}}
                    </td>
                    <th colspan="1"></th>
                   </tr>
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
