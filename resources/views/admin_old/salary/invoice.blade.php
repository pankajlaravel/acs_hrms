@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Department</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12"> 
                <div>
                    <table id="items-table" class="table mb-0 display table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Department Name</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach ($departments as $num => $val )
                            
                            <tr>
                                <td>{{ $num + 1 }}</td>
                                <td>{{ $val['name']  }}</td>
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item editDepartment" href="#" data-toggle="modal" data-id="{{ $val['id'] }}" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item deleteDepartmentBtn" href="#" data-toggle="modal" data-id="{{ $val['id'] }}" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
    
  
    <!-- /Delete Holiday Modal -->
    
</div>
    <!-- /Page Content -->
    
    
    
</div>
<!-- /Page Wrapper -->

@endsection
@section('script')

@endsection

         
      