@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
			
    <!-- Page Content -->
    

        <div class="page-header d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center">
                <div class="col">
                  <h2 class="page-title">
                    Invoices
                  </h2>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Invoices</li>
                </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <a href="{{route('admin.create.invoice')}}" class="btn btn-primary d-none d-sm-inline-block add-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg> Add Invoices</a>
                   
                </div>
              </div>
            </div>
          </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        {{-- <div class="row filter-row">
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="form-select floating"> 
                        <option>Select Status</option>
                        <option>Pending</option>
                        <option>Paid</option>
                        <option>Partially Paid</option>
                    </select>
                    <label class="focus-label">Status</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"> Search </a>  
            </div>     
        </div> --}}
        <!-- /Search Filter -->
        
        <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-md-12">
                <div class="table-responsive">
                    <table id="items-table" class="table mb-0 card-table display table-vcenter text-nowrap custom-table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice Number</th>
                                <th>Client</th>
                                <th>Created Date</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $key => $val)
                            <tr>
                                <td>{{$key+1;}}</td>
                                <td><a href="javascript::void()">{{$val->invoice_id}}</a></td>
                                <td>{{$val->fname.' '.$val->lname}}</td>
                                <td>{{$val->invoice_date}}</td>
                                <td>{{$val->due_date}}</td>
                                <td>{{$val->grand_total}} Rs</td>
                                @if ($val->status == 1)
                                <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                @else
                                <td><span class="badge bg-inverse-success">Paid</span></td>
                                @endif
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <button class="align-text-top btn dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('admin.employee.invoice.edit',$val->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="{{route('admin.invoice.view',$val->id)}}"><i class="fa fa-eye m-r-5"></i> View</a>
                                            {{-- <a class="dropdown-item" href="{{route('admin.invoice.invoice_print',$val->id)}}"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a> --}}
                                            <a class="dropdown-item delete_invoice_form" data-id="{{$val->id}}"  href="javascript::void()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
    </div>
<!-- Employee Modal -->
 {{-- @include('admin.invoice.add_popup'); --}}
 {{-- @include('admin.employee.edit_popup'); --}}
 {{-- @include('admin.employee.delete_popup'); --}}
<!-- / Employee Modal -->
@endsection
@section('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
     // Data Delete
       $(".delete_invoice_form").click(function(e){
          e.preventDefault();
          const id = $(this).data('id');
          // $('.update_invoice').val('Update...');
          $.ajax({
             url: '{{ route("admin.employee.invoice.delete", ":id") }}'.replace(':id', id),
             method:'DELETE',
             data: $(this).serialize(),
             success: function(responce){
                // console.log(responce);
                $('.add_invoice').val('Save');
                Swal.fire({
                         icon: 'success',
                         title: 'Deleted Successfully',
                      })
                      // Redirect after 3 seconds 
                      setTimeout(function() {
                     }, 2000);
                     window.location.href = '/admin/employee/invoices';
                $(".delete_invoice_form")[0].reset();
             }
          });
       });
    });
 </script>

@endsection

         
      