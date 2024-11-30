
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          
   
        
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#basic_info">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Add Employee
              </a>
              
            </div>
          </div>

          {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-bank-info" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                          
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name" />
                       
                            {{-- <div id="suggestions" class="suggestions" style="position: absolute; z-index: 1000; display: none; background: white; border: 1px solid #ddd;"></div> --}}
                            <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px">
                              <i class="fa fa-search"></i> <!-- Bootstrap search icon -->
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <ul class="list-group" style="display:block;position:relative;z-index:1" id="results" ></ul>
              </div>
            </div>
          </div>
        </div>
          
          {{-- Bank  --}}
          <div id="search-results" style="display: none;">
          
        </div>
        {{-- ESI --}}
        <div id="esiSection" style="display: none;">
          
        </div>
        <div id="pfSection" style="display: none;">
          
        </div>
        
        </div>
      </div>
    </div>
    
 @include('admin.employee.pages.empBankForm')
  @endsection
  @section('script')
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.editBankBtn', function() {
        $('#spinner').show();
        const bankId = $(this).data('id');
        // alert(bankId);
        $.get('/admin/bank/detail/edit/' + bankId, function (data) {
            $('#spinner').hide();
                $('#bankId').val(data.id);
                $('#bankName').val(data.bankName);
                $('#branchName').val(data.branchName);
                $('.account_no').val(data.account_no);
                $('.ifsc').val(data.ifsc);
                $('.payment_type').val(data.payment_type);
                $('.account_holder_name').val(data.account_holder_name);
                
                // $('#picture').html(`<img src"{{asset("/employee/img")}}/"`+ data.picture);
                $('.departmentName').val(data.departmentName);
                let bankName = data.bankName; 
                let bank_id = data.bank_id; 

                let branchName = data.branchName; 
                let bank_branch_id = data.bank_branch_id; 
                // $('#department_select').append(`<option value="${imageUrl}">${imageUrl}</option>`); 
                $('.bank_select').append(`<option value="${bank_id}" selected>${bankName}</option>`); 
                $('.branch_select').append(`<option value="${bank_branch_id}" selected>${branchName}</option>`); 
                
                if (data.picture) {
                     $('#previewImage').attr('src', '{{asset("/employee/img")}}/' + data.picture).show(); // Set the src and show the image
                } else {
                    $('#previewImage').hide(); // Hide if no image
                }

                let resultsHtml = `<option value="">Select Department test</option>`;
        if (data.departmentName && data.departmentName.length > 0) {
            $.each(data.departmentName, function(index, department) {
                let selected = (department.id == data.department_id) ? 'selected' : '';
                resultsHtml += `<option value="${data.departmentName}" ${selected}>${data.departmentName}</option>`;
            });
        }
        // $('select[name="department"]').html(resultsHtml);
            });
    });

    $('#edit_employee_bank_details_form').on('submit', function (e) {
     e.preventDefault();
     
     const formData = new FormData(this);
     const bankId = $('#bankId').val();
     $("#updating").text('Updating...');
    $.ajax({
    url: '/admin/bank/details/${bankId}/update', // Adjust the URL as needed
    type: 'POST',
    contentType: false,
    processData: false,
    data: formData,// Assuming you have a form with the ID employeeForm

    success: function(response) {
        $('#edit_employee').modal('hide');
        // alert(response.success);
        Swal.fire({
        icon: 'success',
        title: 'Edit Record Successfully',
        })
        // Redirect after 3 seconds
        setTimeout(function() {
        }, 1000);
        // window.location.href = '/admin/employee/account/info'; // Redirect to home page
        $('#edit_employee_bank_details_form')[0].reset();
        $('#edit_employee_bank_details').modal('hide');
        $('#search-bank-info').trigger('submit');
        $('#spinner').hide();
                    fetchEmployeeId();
    },
    error: function(xhr) {
        console.error(xhr.responseText);
        // Handle errors (display error messages, etc.)
    }
});
});
    });
</script>
  <script>
    $(document).ready(function() {

    // search submit
    $('#search-bank-info').on('submit', function(e) {
      $('#spinner').show();
            e.preventDefault(); // Prevent default form submission 
            $('#search-results').show();
            $('#esiSection').show();
            $('#pfSection').show();
            $.ajax({
                url: '{{ route("employees.bankSearch") }}', // Ensure this is the correct route
                method: 'POST',
                data: $(this).serialize(), // Serialize form data for submission
                success: function(data) {
                    let resultsHtml = '';
                    let resultESI = '';
                    let resultPF = '';
                    $('.emp_id').val(data.emp_id.employee_id);
                // console.log(data.emp_id.employee_id);
                    // alert(data.esi);
                    if (data.bankRecord) {
        $('#original').hide(); // Hide original content

        resultsHtml += `
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Bank Account
                                    <a href="#" class="btn editBankBtn" data-id="${data.bankRecord.id}" data-bs-toggle="modal" data-bs-target="#edit_employee_bank_details">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </h3>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Name</label>
                                            <p>${data.bankRecord.bankName || "--"}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Branch</label>
                                            <p>${data.bankRecord.branchName || "--"}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Account No</label>
                                            <p>${data.bankRecord.account_no || "--"}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">IFSC CODE</label>
                                            <p>${data.bankRecord.ifsc || "--"}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Account Type</label>
                                            <p>${data.bankRecord.account_type || "--"}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Payment Type</label>
                                            <p>${data.bankRecord.payment_type || "--"}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Name As Per Bank Records</label>
                                            <p>${data.bankRecord.account_holder_name || "--"}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    } else {
        // No bank record section (placeholder content)
        resultsHtml += `
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Bank Account
                                    <a href="#" class="btn editEmp" data-id="--" data-bs-toggle="modal" data-bs-target="#add_emp_bank_details">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </h3>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Name</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Branch</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Bank Account No</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">IFSC CODE</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Account Type</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Payment Type</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="mt-2 form-label">Name As Per Bank Records</label>
                                            <p>--</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    }

    // ESI Section
    if (data.esi) {
        resultESI += `
            <div class="col-12">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">ESI Account</h3>
                                            <div class="row row-cards">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <input type="checkbox" id="esiCheckbox" class="form-check-input" checked />
                                                            Employee is covered under ESI
                                                        </label>
                                                        <input type="text" id="esiInput" class="mt-2 form-control" value="${data.esi.esi_number}" />
                                                        <div id="esiActions" class="mt-2">
                                                            <button id="saveEsiBtn" class="btn btn-primary btn-sm">Save</button>
                                                            <button id="cancelEsiBtn" class="btn btn-secondary btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
    }else{
        resultESI += `
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">ESI Account</h3>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label class="form-label">
                                            <input type="checkbox" id="esiCheckbox" class="form-check-input" />
                                            Employee is covered under ESI
                                        </label>
                                        <!-- ESI Number Display -->
                                        <p id="esiDisplay"></p>
                                        <!-- ESI Number Input Field (hidden initially) -->
                                        <input type="text" id="esiInput" class="mt-2 form-control"  style="display: none;" />
                                        <div id="esiActions" class="mt-2" style="display: none;">
                                            <button id="saveEsiBtn" class="btn btn-primary btn-sm">Save</button>
                                            <button id="cancelEsiBtn" class="btn btn-secondary btn-sm">Cancel</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    }
    // ESI Section
   if(data.pf){
    const isExistingMemberEPSChecked = (data.pf.exits_eps === 'true') ? 'checked' : '';
    const allowEPFExcessChecked = (data.pf.allow_epf === 'true') ? 'checked' : '';
    const allowEPSExcessChecked = (data.pf.allow_eps === 'true') ? 'checked' : '';
    resultPF += `<div class="col-12">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Provident Fund Account</h3>
                        <div class="row row-cards">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <input type="checkbox" id="pfCheckbox" class="form-check-input" checked />
                                        Employee is covered under PF
                                    </label>
                                    <input type="text" value="${data.pf.uan || ''}" id="uanInput" class="mt-2 form-control" placeholder="UAN" />
                                    <input type="text" value="${data.pf.pf_number || ''}" id="pfNumberInput" class="mt-2 form-control" placeholder="PF Number" />
                                    <input type="date" value="${data.pf.pf_join_date || ''}" id="pfJoinDateInput" class="mt-2 form-control" placeholder="PF Join Date" />
                                    <input type="text" value="${data.pf.family_pf_number || ''}" id="familyPfNoInput" class="mt-2 form-control" placeholder="Family PF No" />

                                    <div class="mt-2 form-check" id="pfCheckboxOptions">
                                            <input type="checkbox" id="isExistingMemberEPS" class="form-check-input" ${isExistingMemberEPSChecked} />
                                            Is Existing Member of EPS
                                        </div>
                                        <div class="mt-2 form-check" id="pfCheckboxOptions">
                                            <input type="checkbox" id="allowEPFExcess" class="form-check-input" ${allowEPFExcessChecked} />
                                            Allow EPF Excess Contribution
                                        </div>
                                        <div class="mt-2 form-check" id="pfCheckboxOptions">
                                            <input type="checkbox" id="allowEPSExcess" class="form-check-input" ${allowEPSExcessChecked} />
                                            Allow EPS Excess Contribution
                                        </div>

                                    <!-- PF Actions -->
                                    <div id="pfActions" class="mt-2">
                                        <button id="savePfBtn" class="btn btn-primary btn-sm">Save</button>
                                        <button id="cancelPfBtn" class="btn btn-secondary btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}else{
       resultPF += `<div class="col-12">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        Provident Fund Account
                    </h3>
                    <div class="row row-cards">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <input type="checkbox" id="pfCheckbox" class="form-check-input" />
                                    Employee is covered under PF
                                </label>
                                <input type="text" id="uanInput" class="mt-2 form-control" placeholder="UAN" style="display: none;" />
                                <input type="text" id="pfNumberInput" class="mt-2 form-control" placeholder="PF Number" style="display: none;" />
                                <input type="date" id="pfJoinDateInput" class="mt-2 form-control" placeholder="PF Join Date" style="display: none;" />
                                <input type="text" id="familyPfNoInput" class="mt-2 form-control" placeholder="Family PF No" style="display: none;" />

                                <div class="mt-2 form-check" style="display: none;" id="pfCheckboxOptions">
                                    <input type="checkbox" id="isExistingMemberEPS" class="form-check-input" /> Is Existing Member of EPS
                                </div>
                                <div class="mt-2 form-check" style="display: none;" id="pfCheckboxOptions">
                                    <input type="checkbox" id="allowEPFExcess" class="form-check-input" /> Allow EPF Excess Contribution
                                </div>
                                <div class="mt-2 form-check" style="display: none;" id="pfCheckboxOptions">
                                    <input type="checkbox" id="allowEPSExcess" class="form-check-input" /> Allow EPS Excess Contribution
                                </div>

                                <!-- PF Actions -->
                                <div id="pfActions" class="mt-2" style="display: none;">
                                    <button id="savePfBtn" class="btn btn-primary btn-sm">Save</button>
                                    <button id="cancelPfBtn" class="btn btn-secondary btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`;

   }
                    
                    $('#search-results').html(resultsHtml);
                    $('#esiSection').html(resultESI);
                    $('#pfSection').html(resultPF);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('An error occurred. Please try again.');
                },
                complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
            });
        });
    });
    </script>

    <script>
        $(document).ready(function() {
            $('#add_emp_bank_details_form').on('submit', function(e) {
            e.preventDefault();
        let isValid = true;
        $('.error').text(''); // Clear existing errors

        // Client-side validation example
        
        
        $(".save").text('Saving...')
            $.ajax({
                url: '{{ route("employees.empBankDetail")}}',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // alert(response.success);
                    $('#add_emp_bank_details').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Inserted Successfully',
                     })
                     // Redirect after 3 seconds
                     setTimeout(function() {
                            // window.location.href = '/admin/employee/account/info'; // Redirect to home page
                        }, 3000);
                  
                    $('#add_emp_bank_details_form')[0].reset();
                    fetchEmployeeId();
                    fetchUpdatedEmployeeList();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // alert(value[0]);
                        });
                    }
                }
            });
        });
        
        });
    </script>

<script>
    $(document).ready(function() {
        $('.bank').change(function() {
            var bank_id = $(this).val();
            console.log(bank_id);
            
            if (bank_id) {
                $.ajax({
                    url: '/admin/branches/' + bank_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('.branch').empty().append('<option value="">Select Branch</option>');
                        $.each(data, function(key, branch) {
                            $('.branch').append('<option value="' + branch.id + '" data-ifsc="' + branch.ifsc + '">' + branch.branch_name + '</option>');
                        });
                    }
                });
            } else {
                $('.branch').empty().append('<option value="">Select Branch</option>');
                $('.ifsc').val('');
            }
        });

        $('.branch').change(function() {
            var ifsc = $(this).find(':selected').data('ifsc');
            $('.ifsc').val(ifsc);
        });
    });

    function fetchUpdatedEmployeeList() {
 
 $('#search-bank-info').trigger('submit');
}
</script>
<script>
    // ESI
    $(document).on('change', '#esiCheckbox', function() {
    if ($(this).is(':checked')) {
        $('#esiDisplay').hide();        // Hide the ESI display text
        $('#esiInput').show();          // Show the ESI input field
        $('#esiActions').show();        // Show Save and Cancel buttons
    } else {
        resetEsiEditMode();              // Reset to display mode if unchecked
    }
});

// PF
$(document).on('change', '#pfCheckbox', function() {
 
    if ($(this).is(':checked')) {
            $('#uanInput, #pfNumberInput, #pfJoinDateInput, #familyPfNoInput, #pfCheckboxOptions, #pfActions').show();
        } else {
            $('#uanInput, #pfNumberInput, #pfJoinDateInput, #familyPfNoInput, #pfCheckboxOptions, #pfActions').hide();
        }
});


// Cancel button click handler
$(document).on('click', '#cancelEsiBtn', function() {
    resetEsiEditMode();  // Return to display mode without saving
});

$(document).on('click', '#cancelPfBtn', function() {
    resetPFEditMode();  // Return to display mode without saving
});

// Function to reset to display mode
function resetEsiEditMode() {
    $('#esiCheckbox').prop('checked', false);
    $('#esiDisplay').show();           // Show the ESI display text
    $('#esiInput').hide();             // Hide the ESI input field
    $('#esiActions').hide();           // Hide the Save and Cancel buttons
    // $('#esiInput').val($('#esiDisplay').text()); // Reset input field to the original value
}

// PF
function resetPFEditMode() {
    $('#pfCheckbox').prop('checked', false);
    $('#uanInput, #pfNumberInput, #pfJoinDateInput, #familyPfNoInput, #pfCheckboxOptions, #pfActions').hide();// Reset input field to the original value
}

// ESI
$(document).on('click', '#saveEsiBtn', function() {
    let newEsiNumber = $('#esiInput').val();
    let employeeId = $('.emp_id').val(); // Assuming this input holds the employee ID
    // alert(employeeId);

    $.ajax({
        url: '{{route("employee.updateEsi")}}',  // The route for saving ESI number
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),  // CSRF token for security
            employee_id: employeeId,
            esi_number: newEsiNumber,
        },
        success: function(response) {
            if(response.status === 'success') {
                $('#esiDisplay').text(newEsiNumber || "--");
                // alert(response.message);  // Optional success message
            }
            resetEsiEditMode(); 
            $('#search-bank-info').trigger('submit');  // Return to display mode after saving
        },
        error: function(xhr) {
            alert('Error updating ESI number.');
            console.error(xhr.responseText); // For debugging purposes
        }
        // $('#search-bank-info').trigger('submit'); 
    });
});

// PF
$(document).on('click', '#savePfBtn', function() {
    let employeeId = $('.emp_id').val(); // Assuming this input holds the employee ID
    // alert(employeeId);
    $('#spinner').show();
    let pfData = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            employee_id: employeeId,
            uan: $('#uanInput').val(),
            pf_number: $('#pfNumberInput').val(),
            pf_join_date: $('#pfJoinDateInput').val(),
            family_pf_number: $('#familyPfNoInput').val(),
            exits_eps: $('#isExistingMemberEPS').is(':checked'),
            allow_epf: $('#allowEPFExcess').is(':checked'),
            allow_eps: $('#allowEPSExcess').is(':checked'),
        };
    $.ajax({
        url: '{{route("employee.updatePF")}}',  // The route for saving ESI number
        type: 'POST',
        data: pfData,
        success: function(response) {
            // alert(response.status);
            $('#spinner').hide();
            if(response.status === 'success') {
                $('#pfDisplay').text(newEsiNumber || "--");
                // alert(response.message);  // Optional success message
            }
            resetPFEditMode(); 
            $('#search-bank-info').trigger('submit');  // Return to display mode after saving
        },
        error: function(xhr) {
            alert('Error updating PF number.');
            console.error(xhr.responseText); // For debugging purposes
        },
        complete: function() {
                // Hide the spinner after the AJAX request completes
                $('#spinner').hide();
            }
        // $('#search-bank-info').trigger('submit'); 
    });
});
</script>

  @endsection