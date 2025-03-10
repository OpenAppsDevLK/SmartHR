@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit PayRoll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">PayRoll</li>
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
                <h3 class="card-title">Edit PayRoll</h3>
              </div>

              <form method="post" action="{{ url('admin/payroll/edit/'.$getRecord->id) }}" enctype="multipart/form-data" class="form-horizontal">

                {{ csrf_field() }}

                <div class="card-body">

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Employee Name <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <select name="employee_id" id="" class="form-control">
                            <option value="">Select Employee Name</option>
                            @foreach ($getEmployee as $value_employee)
                                <option {{($value_employee->id == $getRecord->employee_id) ? 'selected' : ''}} value="{{$value_employee->id}}">{{$value_employee->name}}</option>
                             @endforeach
                        </select>
                      </div>
                  </div>                
                  
                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Number of Day Work <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="number_of_day_work" value="{{ $getRecord->number_of_day_work}}" class="form-control" required placeholder="Number of day work">
                      </div>
                  </div>       

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Bonus <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="bonus" value="{{ $getRecord->bonus }}" class="form-control" required placeholder="Enter Bonus">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Overtime <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="overtime" value="{{ $getRecord->overtime }}" class="form-control" required placeholder="Enter overtime">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Gross Salary <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="gross_salary" value="{{ $getRecord->gross_salary }}" class="form-control" required placeholder="Enter Gross Salary">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Cash Advance <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="cash_advance" value="{{ $getRecord->cash_advance }}" class="form-control" required placeholder="Enter Cash Advance">
                      </div>
                  </div> 

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Late Hours <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="late_hours" value="{{ $getRecord->late_hours }}" class="form-control" required placeholder="Enter Late Hours">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Absent Days <span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="absent_days" value="{{ $getRecord->absent_days }}" class="form-control" required placeholder="Enter Absent Days">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">SSC Levy(Social Security Contribution Levy)<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="ssc_levy" value="{{ $getRecord->ssc_levy }}" class="form-control" required placeholder="Enter SSC Levy">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Total Deductions<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="text" name="total_deductions" value="{{ $getRecord->total_deductions }}" class="form-control" required placeholder="Enter Total Deductions">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Net Pay<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="netpay" value="{{ $getRecord->netpay }}" class="form-control" required placeholder="Enter Net Pay">
                      </div>
                  </div>

                  <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">Payroll Monthly<span style="color: red;"> *</span></lable>
                      <div class="col-sm-10">
                        <input type="number" name="payroll_monthly" value="{{ $getRecord->payroll_monthly }}" class="form-control" required placeholder="Enter Payroll Monthly">
                      </div>
                  </div>

                </div>

                  <div class="card-footer">
                    
                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
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
