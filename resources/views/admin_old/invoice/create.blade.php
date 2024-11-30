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
            <form id="add_invoice_form" class="item-row">
               @csrf
               <input type="hidden" value="{{'#INV-'.$invoiceId}}" name="invoice_id">
               <div class="row" >
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Client <span class="text-danger">*</span></label>
                        <select class="form-select client_data" name="client_id" id="client_id">
                           <option value="">Select Client</option>
                           @foreach ($clients as $val)
                           <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                           @endforeach
                              
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Project <span class="text-danger">*</span></label>
                        <select name="project_id" class="form-select">
                           <option>Select Project</option>
                           @foreach ($projects as $val)
                           <option value="{{$val->id}}">{{ $val->project_name }}</option>
                              
                           @endforeach
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Email</label>
                        <input class="form-control client_email" type="email" name="email">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Tax</label>
                        <select class="form-select tax-select" name="tax">
                           <option value="">Select Tax</option>
                           @foreach ($texes as $val)
                           <option value="{{$val->id}}" data-tax-percentage="{{ $val->percentage }}">{{$val->name}}</option>  
                           @endforeach
                        </select>

                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Client Address</label>
                        <textarea name="client_address" class="form-control client_address" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Billing Address</label>
                        <textarea name="billing_address" class="form-control" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Invoice date <span class="text-danger">*</span></label>
                        
                           <input class="form-control datetimepicker" name="invoice_date" type="date">
                        
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                     <div class="form-group">
                        <label class="mt-4 form-label">Due Date <span class="text-danger">*</span></label>
                       
                           <input class="form-control datetimepicker"  name="due_date" type="date">
                        
                     </div>
                  </div>
               </div>
               <div class="row" >
                  <div class="col-md-12 col-sm-12" >
                     <div class="table-responsive">
                        <table class="table table-hover table-white">
                           <thead>
                              <tr>
                                 <th style="width: 20px">#</th>
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
                              <td>1</td>
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
                                 <input name="qty[]" class="form-control qty" style="width:80px" type="number">
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
                                 <td class="text-right">Total</td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input type="text" class="text-right form-control total_amount" name="total_amount" id="" readonly="">
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" class="text-right">Tax  %</td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input class="text-right form-control tax_percentage_display"  id="tax_percentage_display" name="tax_percentage"  readonly="" type="text">
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" class="text-right">
                                    Discount %
                                 </td>
                                 <td style="text-align: right; padding-right: 30px;width: 230px">
                                    <input class="text-right form-control discount" name="discount" type="number" >
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="5" style="text-align: right; font-weight: bold">
                                    Grand Total
                                 </td>
                                 <td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                    <input class="text-right form-control total_amount" name="grand_total" type="text" readonly>
                                 </td>
                              </tr>
                           </tbody>
                        </table>                               
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="mt-4 form-label">Other Information</label>
                              <textarea class="form-control" name="other_info"></textarea>
                           </div>
                        </div>
                     </div>

                     
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="mt-4 form-label" class="mt-4 col-form-label">Status</label>
                        <select class="form-select" name="status">
                           <option value="0">Paid</option>
                           <option value="1">Unpaid</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn m-r-10 add_invoice" type="submit">Save</button>
                  {{-- <button class="btn btn-primary submit-btn">Save</button> --}}
               </div>
            </form>
         </div>
      </div>
  
   <!-- /Page Content -->

@endsection
@section('script')
<script>
   $(document).ready(function(){
      $(document).on('change','.client_data',function(){
         var id = $(this).val();
         // console.log(id);
         // alert(id);
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
 

   // Function to calculate total amounts
   $(document).ready(function () {
       // Add More Item Row
       $(document).on('click', '.add_item_btn', function () {
           var rowCount = $('#show_item tr').length + 1;
           var newRow = `
           <tr class="item-row">
               <td>${rowCount}</td>
               <td><input name="item[]" class="form-control" type="text" style="min-width:150px"></td>
               <td><input name="description[]" class="form-control" type="text" style="min-width:150px"></td>
               <td><input name="unit_cost[]" class="form-control unit_cost" style="width:100px" type="text"></td>
               <td><input name="qty[]" class="form-control qty" style="width:80px" type="number"></td>
               <td><input name="amount[]" class="form-control amount" readonly="" style="width:120px" type="text"></td>
               <td><a href="javascript:void(0)" class="text-danger font-18 remove_item_btn" title="Remove"><i class="fa fa-trash"></i></a></td>
           </tr>`;
           $('#show_item').append(newRow);
       });
   
       // Remove Item Row
       $(document).on('click', '.remove_item_btn', function () {
           $(this).closest('tr').remove();
           calculateTotal(); // Recalculate total after removing row
       });
   
       // Calculate amount on unit cost or quantity change
       $(document).on('input', '.unit_cost, .qty', function () {
           var row = $(this).closest('tr');
           var unitCost = parseFloat(row.find('.unit_cost').val()) || 0;
           var qty = parseFloat(row.find('.qty').val()) || 0;
           var amount = unitCost * qty;
           row.find('.amount').val(amount.toFixed(2)); // Update amount in the current row
           calculateTotal(); // Recalculate total whenever unit cost or qty changes
       });
       
       // Function to calculate total and grand total using a for loop
       function calculateTotal() {
           var total = 0;
           var taxPercentage = parseFloat($('select[name="tax"] option:selected').data('tax-percentage')) || 0;
           var discount = parseFloat($('input[name="discount"]').val()) || 0;
           // alert(taxPercentage);  
           $('.tax_percentage_display').text(taxPercentage + '%');  
           var rows = $('#show_item tr'); // Get all rows
           for (var i = 0; i < rows.length; i++) {
               var row = $(rows[i]); // Get the current row
               var amount = parseFloat(row.find('.amount').val()) || 0; // Get the amount value
               total += amount; // Add amount to the total
           }
   
           var taxAmount = (total * taxPercentage) / 100; // Calculate tax
           var grandTotal = total + taxAmount - discount; // Calculate grand total
   
           $('input[name="total_amount"]').val(total.toFixed(2)); // Update total
           $('input[name="grand_total"]').val(grandTotal.toFixed(2)); // Update grand total
           $('input[name="tax_percentage"]').val(taxPercentage.toFixed(2)); // Update grand total
       }
   
       // Trigger recalculation on tax change (from dropdown) and discount changes
       $(document).on('change', 'select[name="tax"], input[name="discount"]', function () {
           calculateTotal(); // Recalculate when tax or discount changes
       });
   });
   
   
   $("#add_invoice_form").submit(function(e) {
       e.preventDefault();
       $('.add_invoice').val('Saving...');
       $.ajax({
           url: '{{route("admin.employee.invoice.store")}}',
           method: 'post',
           data: $(this).serialize(),
           success: function(response) {
               $('.add_invoice').val('Save');
               Swal.fire({
                   icon: 'success',
                   title: 'Inserted Successfully',
               });
               // Redirect after 2 seconds
               setTimeout(function() {
                   window.location.href = '/admin/employee/invoices';
               }, 2000);
               $("#add_invoice_form")[0].reset();
           },
           error: function() {
               $('.add_invoice').val('Save');
               Swal.fire({
                   icon: 'error',
                   title: 'Error saving data',
                   text: 'Please try again.'
               });
           }
       });
   });
   
   
   </script>  
@endsection

         
      