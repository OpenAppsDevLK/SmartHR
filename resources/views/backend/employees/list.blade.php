@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">Add Employees</a>
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
                                <h3 class="card-title">Search Employees</h3>

                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label for="">ID</label>
                                            <input type="text" name="id" value="{{ Request()->id }}"
                                                class="form-control" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">First Name</label>
                                            <input type="text" name="name" value="{{ Request()->name }}"
                                                class="form-control" placeholder="First Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" value="{{ Request()->last_name }}"
                                                class="form-control" placeholder="Last Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="{{ Request()->email }}"
                                                class="form-control" placeholder="Email ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>



                                    </div>
                                </div>
                            </form>

                        </div>


                        {{-- _message.blade.php file, this file contain message HTML code. --}}
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employees List</h3>
                            </div>


                            <div class="card-body p-0 table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Profile Image</th>
                                            <th>Is Role</th>
                                            <th>Interview</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- Show all the users in the database. the model file, User.php --}}
                                        {{-- @foreach ($getRecord as $value) --}}

                                        {{-- if you want to show *No Record Found* use forelse directive.  --}}
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>

                                                <td>
                                                    @if (!empty($value->profile_image))
                                                   
                                                    {{-- Check if the file is avalable in the path. because if the files remove the path, then it will give a image error.
                                                    according to prevent this issue, we can use file_exists. --}}
                                                        @if (file_exists('upload/' . $value->profile_image))
                                                            <img src="{{ url('upload/' . $value->profile_image) }}"
                                                                style="height: 80px; width:80px" alt="Profile Image">
                                                        @endif
                                                        <a href="{{url('admin/employees/image_delete/'.$value->id)}}" onclick="return confirm('Do you want to delete this image?')"><span class="fa fa-trash" ></span></a>
                                                    @endif
                                                </td>

                                                <td>{{ !empty($value->is_role) ? 'HR' : 'Employees' }}</td>
                                                <td>
                                                    @if($value->interview == '0')
                                                    Cancel
                                                    @elseif($value->interview == '1')
                                                    Pending
                                                    @elseif($value->interview == '2')
                                                    Completed
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/employees/view/' . $value->id) }}"
                                                        class="class btn btn-info">View</a>
                                                    <a href="{{ url('admin/employees/edit/' . $value->id) }}"
                                                        class="class btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/employees/delete/' . $value->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                        class="class btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
                                            </tr>
                                        @endforelse

                                        {{-- @endforeach --}}

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
