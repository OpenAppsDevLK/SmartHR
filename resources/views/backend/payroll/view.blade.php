@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View PayRoll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
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
                                <h3 class="card-title">View PayRoll</h3>
                            </div>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="card-body">

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">ID <span style="color: red;"> *</span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Employee Name <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->get_employee_name->name) ? $getRecord->get_employee_name->name : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Number of day work <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->number_of_day_work }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Bonus <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->bonus }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Overtime <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->overtime }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Gross Salary <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->gross_salary }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Cash Advance<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->cash_advance }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Late Hours <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->late_hours }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Absent Days<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->absent_days }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">SSC Levy(Social Security Contribution Levy) <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->ssc_levy }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Total Deductions <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->total_deductions }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Net Pay<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->netpay }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Payroll Monthly<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->payroll_monthly }}
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Created Date <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Updated Date <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}

                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">

                                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>

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
