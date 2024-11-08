</div>
      <!-- /Main Wrapper -->
      <!-- javascript links starts here -->
      <!-- jQuery -->
      <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
      <!-- Bootstrap Core JS -->
      <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
      <!-- Slimscroll JS -->
      <script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>
      <!-- Chart JS -->
      <script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
      <script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/chart.js')}}"></script>
      <!-- Select2 JS -->
	  <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
      <!-- Custom JS -->
      <script src="{{asset('admin/assets/js/app.js')}}"></script>
      <!-- javascript links ends here  -->

      <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
      
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
       <!-- Custome Scripet -->
        @yield('scripts')
        <!-- /Custome Scripet -->
        <script>
            $(document).ready(function() {
                  $('#search_results_client').empty();

                  // Hide the original element
                  
                $('#search_client').on('submit', function(e) {
                    // alert('ok');
                    e.preventDefault(); // Prevent default form submission
                  //   $('#original').hide();
                    $.ajax({
                        url: '{{ route("client.ajaxSearch") }}',
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {
                            let resultsHtml = '';
                            
                            if (data.length > 0) {
                              $('.original').hide();
                                $.each(data, function(index, client) {
                                    resultsHtml += `
                                    <div class="row staff-grid-row">
                                    <span class="error"></span>
                                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3" >
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="javascript:void(0);" class="avatar">
                                <img src="{{ asset('clients/img/') }}/${client.picture}" alt="picture">
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item editEmployee" href="#" data-toggle="modal" data-id="${client.id}" data-target="#edit_employee">
                                    <i class="fa fa-pencil m-r-5"></i> Edit
                                </a>
                                <a class="dropdown-item deleteUserBtn" href="javascript:void(0);" data-id="${client.id}">
                                    <i class="fa fa-trash-o m-r-5"></i> Delete
                                </a>
                            </div>
                        </div>
                        <h4 class="mb-0 user-name m-t-10 text-ellipsis">
                            <a href="#">${client.firstName} ${client.lastName}</a>
                        </h4>
                        <div class="small text-muted">${client.company_name}</div>
                        <div class="small text-muted">${client.client_id}</div>
                        <a href="javascript::void()" class="btn btn-white btn-sm m-t-10">View Profile</a>
                    </div>
               </div>
               </div>
            `;
                                });
                            } else {
                              $('.original').hide();
                               resultsHtml += `
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="javascript:void(0);" class="avatar">
                            <img src="{{ asset('error/data_not_found.webp') }}" alt="No Image">
                        </a>
                    </div>
                    <div class="profile-action">
                        <h4 class="mb-0 user-name m-t-10 text-ellipsis">
                            <a href="#">No Employees Found</a>
                        </h4>
                        <div class="small text-muted">Try adjusting your search criteria.</div>
                    </div>
                </div>
            </div>
        `;
                            }
                            
                            
                            $('#search_results_client').html(resultsHtml);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            alert('An error occurred. Please try again.');
                        }
                    });
                });
            });
            </script>

            {{-- Search for client --}}
            <script>
                $(document).ready(function() {
                      $('#search-results').empty();
    
                      // Hide the original element
                      
                    $('#search-form').on('submit', function(e) {
                        e.preventDefault(); // Prevent default form submission
                      //   $('#original').hide();
                        $.ajax({
                            url: '{{ route("employees.ajaxSearch") }}',
                            method: 'POST',
                            data: $(this).serialize(),
                            success: function(data) {
                                let resultsHtml = '';
                                
                                if (data.length > 0) {
                                  $('#original').hide();
                                    $.each(data, function(index, employee) {
                                        resultsHtml += `
                                        <div class="row staff-grid-row">
                                        <span class="error"></span>
                                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3" >
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="javascript:void(0);" class="avatar">
                                    <img src="{{ asset('employee/img/') }}/${employee.picture}" alt="picture">
                                </a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item editEmployee" href="#" data-toggle="modal" data-id="${employee.id}" data-target="#edit_employee">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>
                                    <a class="dropdown-item deleteUserBtn" href="javascript:void(0);" data-id="${employee.id}">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>
                            <h4 class="mb-0 user-name m-t-10 text-ellipsis">
                                <a href="#">${employee.firstName} ${employee.lastName}</a>
                            </h4>
                            <div class="small text-muted">${employee.position_name}</div>
                            <a href="javascript::void()" class="btn btn-white btn-sm m-t-10">View Profile</a>
                        </div>
                   </div>
                   </div>
                `;
                                    });
                                } else {
                                  $('#original').hide();
                                   resultsHtml += `
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="javascript:void(0);" class="avatar">
                                <img src="{{ asset('error/data_not_found.webp') }}" alt="No Image">
                            </a>
                        </div>
                        <div class="profile-action">
                            <h4 class="mb-0 user-name m-t-10 text-ellipsis">
                                <a href="#">No Client Found</a>
                            </h4>
                            <div class="small text-muted">Try adjusting your search criteria.</div>
                        </div>
                    </div>
                </div>
            `;
                                }
                                
                                
                                $('#search-results').html(resultsHtml);
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                                alert('An error occurred. Please try again.');
                            }
                        });
                    });
                });
                </script>


      <script>
  $(document).ready(function() {

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
});

</script>  
<script>
    // Initialize Flatpickr with datetime picker
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "d-m-Y"
        // dateFormat: "Y-m-d H:i"
    });
</script>        
   </body>
</html>