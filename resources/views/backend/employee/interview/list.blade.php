@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Interview</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12">


        {{-- _message.blade.php file, this file contain message HTML code.--}}
        @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Interview List</h3>
              </div>
            

            <div class="card-body p-0 table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Interview</th>
                    <th>Create At</th>
                    <th>Update At</th>
                  </tr>
                </thead>
                <tbody>


                 
                  
                  <tr>
                    <td>{{ $getRecord->id }}</td>
                    <td>{{ $getRecord->name }}</td>
                    <td>{{ $getRecord->salary }}</td>
                    <td>
                          @if($getRecord->interview == '0')
                          Cancel
                          @elseif($getRecord->interview == '1')
                          Pending
                          @elseif($getRecord->interview == '2')
                          Completed
                          @endif
                     </td>
                     <td>{{ date('Y-m-d', strtotime($getRecord->created_at)) }}</td>
                     <td>{{ date('Y-m-d', strtotime($getRecord->updated_at)) }}</td>
                  </tr>
                </tbody>
              </table>
              
              <div style="padding: 10px; float: right;">
                {{-- This is the pagination code. you have to fix the pagination on AppServiceProvider.php file. --}}
                 {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}  --}}
                
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
