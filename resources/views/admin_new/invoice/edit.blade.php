@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
			
   <!-- Page Content -->
       <div class="content container-fluid">
   
      <!-- Page Header -->
      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">Create Invoice</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Create Invoice</li>
               </ul>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
      
      <div class="row">
         <div class="col-sm-12">
            <form id="edit_invoice_form" class="item-row">
               @csrf
               <input type="hidden" value="{{$invoices[0]->client_id}}" name="invoice_id">
               <input type="hidden" value="{{$invoices[0]->id}}" id="invoice_id" name="id">
               <input type="hidden" value="{{$invoices[0]->invoice_id}}" id="invoice_id" name="invoice_id">
               <div class="row" >
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Client <span class="text-danger">*</span></label>
                        <select class="form-select client_data" name="client_id" id="client_id">
                           @php
                             $selectedClientId= $invoices[0]->client_id;
                           @endphp
                           @foreach ($clients as $val)
                           <option value="{{ $val['id'] }}" 
                                 @if ($val['id'] == $selectedClientId) selected @endif>
                                 {{ $val['name'] }}
                           </option>
                           @endforeach   
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Project <span class="text-danger">*</span></label>
                        <select name="project_id" class="form-select">
                           @php
                             $selectedProjectId= $invoices[0]->project_id;
                           @endphp
                           
                           <option>Select Project</option>
                           @foreach ($projects as $val)
                           <option value="{{$val->id}}"
                              @if ($val['id'] == $selectedProjectId) selected @endif>
                              {{ $val->project_name }}
                           </option>
                              
                           @endforeach
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Email</label>
                        <input class="form-control client_email" value="{{$invoices[0]->email}}" type="email" name="email">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Tax</label>
                        @php
                             $selectedTax= $invoices[0]->tax;
                           @endphp
                        <select class="form-select tax-select" name="tax">
         
                           <option value="">Select Tax</option>
                           @foreach ($texes as $val)
                              <option value="{{ $val->id }}" data-tax-percentage="{{ $val->percentage }}" {{ $val->id == $selectedTax ? 'selected' : '' }}>
                                    {{ $val->name }}
                              </option>  
                           @endforeach
                       </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Client Address</label>
                        <textarea name="client_address"  class="form-control client_address" rows="3">{{$invoices[0]->client_address}}</textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Billing Address</label>
                        <textarea name="billing_address" class="form-control" rows="3">{{$invoices[0]->billing_address}}</textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Invoice date <span class="text-danger">*</span></label>
                        
                           <input class="form-control datetimepicker" value="{{$invoices[0]->invoice_date}}" name="invoice_date" type="date">
                        
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="form-label mt-2">Due Date <span class="text-danger">*</span></label>
                       
                           <input class="form-control datetimepicker"  name="due_date" value="{{$invoices[0]->due_date}}" type="date">
                        
                     </div>
                  </div>
               </div>
               <div class="row" >
                  <div class="col-md-12 col-sm-12" >
                     <div class="table-responsive">
                        <table class="table table-hover table-white">
                           <thead>
                              <tr>
                                 {{-- <th style="width: 20px">#</th> --}}
                                 <th class="col-sm-2">Item</th>
                                 <th class="col-md-6">Description</th>
                                 <th style="width:100px;">Unit Cost</th>
                                 <th style="width:80px;">Qty</th>
                                 <th>Amount</th>
                                 <th> </th>
                              </tr>
                           </thead>
                           <tbody id="show_item">
                           <tr>
                              @foreach ($customArray as $index => $item)
                              <td>{{ $index+1 }}</td>
                              <td>
                                 
                                 <input name="item[]" value="{{ $item['item'] }}" class="form-control" type="text" style="min-width:150px">
                              </td>
                              
                              <td>
                                 <input name="description[]" value="{{ $item['description'] }}" class="form-control" type="text" style="min-width:150px">
                              </td>
                              <td>
                                 <input name="unit_cost[]" value="{{ $item['unit_cost'] }}" class="form-control unit_cost" style="width:100px" type="text">
                              </td>
                              <td>
                                 <input name="qty[]" value="{{ $item['qty'] }}" class="form-control qty" style="width:80px" type="number">
                              </td>
                              <td>
                                 <input name="amount[]" value="{{ $item['amount'] }}" class="form-control amount" readonly="" style="width:120px" type="text">
                              </td>
                              <td><a href="javascript:void(0)" class="text-danger font-18 remove_item_btn" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                           </tr>
                           @endforeach
                           <tr>
                              <td></td>
                           <td>
                              <input name="item[]" class="form-control" type="text" style="min-width:150px">
                           </td>
                           <td>
                              <input name="description[]" class="form-control" type="text" style="min-width:150px">
                           </td>
                           <td>
                              <input name="unit_cost[]" class="form-control unit_cost" style="width:100px" type="text">
                           </td>
                           <td>
                              <input name="qty[]" class="form-control qty" style="width:80px" type="text">
                           </td>
                           <td>
                              <input name="amount[]" class="form-control amount" readonly="" style="width:120px" type="text">
                           </td>
                           <td><a href="javascript:void(0)" class="text-success font-18 add_item_btn" title="Add"><i class="fa fa-plus"></i></a></td>
                        </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-hover table-white">
                           <tbody>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td class="text-right">Total %</td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input type="text" class="text-right form-control total_amount" name="total_amount" value="{{$invoices[0]->total_amount}}" id="" readonly="">
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" class="text-right">Tax %</td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input class="text-right form-control percentage" name="tax_percentage"  value="{{$invoices[0]->tax_percentage}}" readonly="" type="text">
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" class="text-right">
                                    Discount %
                                 </td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input class="text-right form-control discount" name="discount" value="{{$invoices[0]->discount}}" type="number">
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" style="text-align: right; font-weight: bold">
                                    Grand Total
                                 </td>
                                 <td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                    <input class="text-right form-control total_amount" name="grand_total" type="text" value="{{$invoices[0]->grand_total}}">
                                 </td>
                              </tr>
                           </tbody>
                        </table>                               
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="form-label mt-2">Other Information</label>
                              <textarea class="form-control" name="other_info" >{{$invoices[0]->other_info}}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-select invoice_status" name="status">
                           <option value="0">Paid</option>
                           <option value="1">Unpaid</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn m-r-10 add_invoice" type="submit">Save</button>
                  {{-- <button class="btn btn-primary submit-btn">Save</button> --}}
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- /Page Content -->
   
</div>
@endsection
@section('script')
<script>
   $(document).ready(function(){
      $(document).on('change','.client_data',function(){
         var id = $(this).val();
         // console.log(id);
         // alert(id);
         if(status == 0){
                    $('.invoice_status').append(`<option value="${status}" selected>Paid</option>`);
                    $('.invoice_status').append(`<option value="1">Unpaid</option>`);
                }else if(status == 1){
                    $('.invoice_status').append(`<option value="${status}" selected>Unpaid</option>`);
                    $('.invoice_status').append(`<option value="0">Paid</option>`);
                }
         var client_id = $(this).val();
         $.ajax({
            type:'GET',
            url: '{{route("find.client.name")}}',
            data:{'id':client_id},
            success:function(data){
               console.log('success');
               $('.client_email').val(data.email);
               $('.client_address').val(data.address);
               // console.log(data.email);
               // a.find('.client_email').val(data.email);
               
            },
            error:function(){

            }
         });
      });
   });
</script>
<script>
   $(document).ready(function(){
      // alert('ok');
     

   

      // Edit Data
      $("#edit_invoice_form").submit(function(e){
         e.preventDefault();
         var id = $('#invoice_id').val();
         // alert(id);
         $('.update_invoice').val('Update...');
         $.ajax({
            url: '{{ route("admin.employee.invoice.update", ":id") }}'.replace(':id', id),
            method:'post',
            data: $(this).serialize(),
            success: function(responce){
               // console.log(responce);
               $('.add_invoice').val('Save');
               Swal.fire({
                        icon: 'success',
                        title: 'Updated Successfully',
                     })
                     // Redirect after 3 seconds admin.employee.invoice.delete
                     setTimeout(function() {
                    }, 2000);
                    window.location.href = '/admin/employee/invoices';
               $("#edit_invoice_form")[0].reset();
            }
         });
      });

      // Data Delete
      $("#delete_invoice_form").submit(function(e){
         e.preventDefault();
         var id = $('#invoice_id').val();
         // alert(id);
         // $('.update_invoice').val('Update...');
         $.ajax({
            url: '{{ route("admin.employee.invoice.delete", ":id") }}'.replace(':id', id),
            method:'post',
            data: $(this).serialize(),
            success: function(responce){
               // console.log(responce);
               $('.add_invoice').val('Save');
               Swal.fire({
                        icon: 'success',
                        title: 'Updated Successfully',
                     })
                     // Redirect after 3 seconds 
                     setTimeout(function() {
                    }, 2000);
                    window.location.href = '/admin/employee/invoices';
               $("#edit_invoice_form")[0].reset();
            }
         });
      });
   });
</script>
@endsection

         
      