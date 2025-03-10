@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">View Employees</h3>
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
                                        <lable class="col-sm-2 col-form-lable">First Name <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Last Name <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->last_name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Email ID <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->email }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Phone No <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->phone_number }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Profile Image <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            @if (!empty($getRecord->profile_image))
                                                   
                                            {{-- Check if the file is avalable in the path. because if the files remove the path, then it will give a image error.
                                            according to prevent this issue, we can use file_exists. --}}
                                                @if (file_exists('upload/' . $getRecord->profile_image))
                                                    <img src="{{ url('upload/' . $getRecord->profile_image) }}"
                                                        style="height: 80px; width:80px" alt="Profile Image">
                                                @endif
                                                
                                            @endif

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Hire Date <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Job ID <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{-- In this case, we are creating a relationship bitween [User model] and [JobModel] and get the job title 
                                            through get_job_single function on User Model --}}
                                            {{ !empty($getRecord->get_job_single->job_title) ? $getRecord->get_job_single->job_title : '' }}
                                            {{-- {{ $getRecord->get_job_single->job_title }} --}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Salary <span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->salary }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Commission PCT <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ $getRecord->commission_pct }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Manager Name <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{-- In this case, we are creating a relationship bitween [User model] and [ManagerModel] and get the Manager Name 
                                            through get_manager_name_single function on User Model --}}
                                            {{ !empty($getRecord->get_manager_name_single->manager_name) ? $getRecord->get_manager_name_single->manager_name : '' }}

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Department Name <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{-- In this case, we are creating a relationship bitween [User model] and [DepartmentModel] and get the Manager Name 
                                            through get_department_name_single function on User Model --}}
                                            {{ !empty($getRecord->get_department_name_single->department_name) ? $getRecord->get_department_name_single->department_name : '' }}


                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Position Name <span style="color: red;">
                                            </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{-- In this case, we are creating a relationship bitween [User model] and [DepartmentModel] and get the Manager Name 
                                            through get_department_name_single function on User Model --}}
                                            {{ !empty($getRecord->get_position_name_single->position_name) ? $getRecord->get_position_name_single->position_name : '' }}


                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">IS Role<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->is_role) ? 'HR' : 'Employees' }}

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <lable class="col-sm-2 col-form-lable">Interview<span style="color: red;"> </span>
                                        </lable>
                                        <div class="col-sm-10">
                                            @if($getRecord->interview == '0')
                                            Cancel
                                            @elseif($getRecord->interview == '1')
                                            Pending
                                            @elseif($getRecord->interview == '2')
                                            Completed
                                            @endif
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

                                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>

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
