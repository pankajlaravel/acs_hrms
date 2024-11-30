</div>
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label mt-2">Name</label>
          <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
        </div>
        <label class="form-label mt-2">Report type</label>
        <div class="mb-3 form-selectgroup-boxes row">
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
              <span class="p-3 form-selectgroup-label d-flex align-items-center">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="mb-1 form-selectgroup-title strong">Simple</span>
                  <span class="d-block text-secondary">Provide only basic data needed for the report</span>
                </span>
              </span>
            </label>
          </div>
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
              <span class="p-3 form-selectgroup-label d-flex align-items-center">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="mb-1 form-selectgroup-title strong">Advanced</span>
                  <span class="d-block text-secondary">Insert charts and additional advanced analyses to be inserted in the report</span>
                </span>
              </span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-3">
              <label class="form-label mt-2">Report url</label>
              <div class="input-group input-group-flat">
                <span class="input-group-text">
                  https://tabler.io/reports/
                </span>
                <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="mb-3">
              <label class="form-label mt-2">Visibility</label>
              <select class="form-select">
                <option value="1" selected>Private</option>
                <option value="2">Public</option>
                <option value="3">Hidden</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label mt-2">Client name</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label mt-2">Reporting period</label>
              <input type="date" class="form-control">
            </div>
          </div>
          <div class="col-lg-12">
            <div>
              <label class="form-label mt-2">Additional information</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer mt-3">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Create new report
        </a>
      </div>
    </div>
  </div>
</div>

 <!-- Libs JS -->
 <script src="{{asset('admin/dist/libs/apexcharts/dist/apexcharts.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/jsvectormap.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/libs/jsvectormap/dist/maps/world-merc159a.js?1726507346')}}" defer></script>
 <!-- Tabler Core -->
 <script src="{{asset('admin/dist/js/tabler.min159a.js?1726507346')}}" defer></script>
 <script src="{{asset('admin/dist/js/demo.min159a.js?1726507346')}}" defer></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
 <script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: '{{route("admin.employee.list")}}',
                    type: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#results').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                var fullName = item.firstName + ' '+ item.lastName
                                var employee_id = item.employee_id;
                                // $('#results').append('<li class="list-group result-item" data-name="'+ item.firstName'">' + item.firstName + '</li>');
                                $('#results').append('<li class="list-group result-item" data-name="' + fullName + '">' +fullName+ '</li>');
                            });
                        } else {
                            $('#results').append('<li class="list-group">No results found</li>');
                        }
                    },
                    error: function() {
                        $('#results').append('<li class="list-group">Error retrieving results</li>');
                    }
                });
            } else {
                $('#results').empty();
            }
        });

        $('#results').on('click', '.result-item', function() {
        // Get the name from the clicked item
        const name = $(this).data('name');
        // Set the input value to the clicked item's name
        $('#search').val(name);
        // Clear the results after selection
        $('#results').empty();
    });

    // search submit
    $('#search-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            $('#search-results').show();
            $.ajax({
                url: '{{ route("employees.ajaxSearch") }}', // Ensure this is the correct route
                method: 'POST',
                data: $(this).serialize(), // Serialize form data for submission
                success: function(data) {
                    let resultsHtml = '';

                    if (data.length > 0) {
                        $('#original').hide(); // Hide original content
                        $.each(data, function(index, employee) {
                            resultsHtml += `
                            <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" style="background-color: #ace5d3c4;">
                  <div class="card-body">
                    <h3 class="card-title">${employee.employee_id || "--"}</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <div class="mb-3">
                          {{-- <label class="form-label mt-2">Company</label> --}}
                          
                        </div>
                      </div>
                     
                    </div>
                  </div>

                </div>
              </div>
              
            </div>
          </div>
                             {{-- Employee Information --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Employee Information  <a href="#" class="btn editEmployee" data-id="${employee.id}" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa fa-pencil"></i></a> </h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Title</label>
                          <p>${employee.title || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Nick Name</label>
                          <p>${employee.nick_name || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Gender</label>
                          <p>${employee.gender || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Name</label>
                          <p>${employee.firstName} ${employee.lastName}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Employee Login Username
                          </label>
                          <p>${employee.username || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Mobile</label>
                          <p>${employee.phone || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Email</label>
                          <p>${employee.email || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Extension</label>
                          <p>${employee.extension || "--"}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Personal Inforamtion --}}
          <div class="mt-2 col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Personal  Information  <a href=""><i class="fa fa-pencil"></i></a></h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">DOB</label>
                          <p>${employee.dob || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Birthday</label>
                          <p>${employee.birth_day || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Blood Group
                          </label>
                          <p>${employee.blood_group || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Father's Name
                          </label>
                          <p>${employee.father_name || "--"}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Marital Status
                          </label>
                          <p>${employee.marital_status || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Marriage Date
                          </label>
                          <p>${employee.marital_date || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Spouse Name
                          </label>
                          <p>${employee.spouse_name || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Nationality</label>
                          <p>${employee.nationality || "--"}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Residential Status
                          </label>
                          <p>${employee.residential_status || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Place Of Birth
                          </label>
                          <p>${employee.place_of_birth || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Country Of Origin
                          </label>
                          <p>${employee.country_of_origin || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Religion</label>
                          <p>${employee.religion || "--"}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">International Employee
                          </label>
                          <p>${employee.international_emp || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Physically Challenged
                          </label>
                          <p>${employee.physically_challened || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Is Director
                          </label>
                          <p>${employee.is_director || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Personal Email
                          </label>
                          <p>${employee.personal_email  || "--"}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- end --}}
          {{-- Joining Details --}}
          <div class="mt-2 col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Joining Details <a href=""><i class="fa fa-pencil"></i></a></h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Joined On</label>
                          <p>${employee.joining_Date || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Confirmation Date</label>
                          <p>${employee.join_confrimation_date || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Status</label>
                          <p>${employee.joining_status || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Probation Period</label>
                          <p>${employee.probation_period || "--"}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Notice Period
                          </label>
                          <p>${employee.notice_period || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Current Company Experience</label>
                          <p>${employee.current_company_experience || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Previous Experience</label>
                          <p>${employee.pre_company_experiecne || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Total Experience</label>
                          <p>${employee.total_experience || "--"}</p>
                        </div>
                      </div>
                    </div>

                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Referred By
                          </label>
                          <p>${employee.referred_by || "--"}</p>
                        </div>
                      </div>
                                                               
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{--  --}}

          {{-- Current Position --}}
          <div class="mt-2 col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Current Position <a href=""><i class="fa fa-pencil"></i></a></h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Division</label>
                          <p>${employee.division || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Grade</label>
                          <p>${employee.grade || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Department</label>
                          <p>${employee.department || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Location</label>
                          <p>${employee.location || "--"}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Designation
                          </label>
                          <p>${employee.position || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Reporting To</label>
                          <p>${employee.reporting || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Category</label>
                          <p>${employee.role || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Attendance Marking Option</label>
                          <p>${employee.attendance_marking_option || "--"}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- end --}}

          {{-- Present Address --}}
          <div class="mt-2 col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Present Address <a href=""><i class="fa fa-pencil"></i></a></h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Name</label>
                          <p>${employee.extension || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Address</label>
                          <p>${employee.address || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">City
                          </label>
                          <p>${employee.city || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">State
                          </label>
                          <p>${employee.state || "--"}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Country
                          </label>
                          <p>${employee.country || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Pincode
                          </label>
                          <p>${employee.pin || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Phone1
                          </label>
                          <p>${employee.phone1 || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Phone2</label>
                          <p>${employee.phone2 || "--"}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Ext
                          </label>
                          <p>${employee.extension || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Fax
                          </label>
                          <p>${employee.fax || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Mobile
                          </label>
                          <p>${employee.phone || "--"}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="form-label mt-2">Emial</label>
                          <p>${employee.email || "--"}</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- end --}}
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
                                        <a href="#">No Employee Found</a>
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
</body>

<!-- Mirrored from preview.tabler.io/layout-fluid-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 10:17:49 GMT -->
</html>