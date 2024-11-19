
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
                  
                  <a href="{{route('employee.analyticsHub')}}" class="btn btn-primary d-none d-sm-inline-block" >Back</a>
                  
                </div>
              </div>
          {{-- Search --}}
          
          
          {{--  --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" style="background-color: #ace5d3c4;">
                  <div class="card-body">
                    <h3 class="card-title">{{$results->employee_id}}</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <div class="mb-3">
                          {{-- <label class="mt-2 form-label">Company</label> --}}
                          
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
                    <h3 class="card-title">Employee Information   </h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Title</label>
                          <p>{{$results->title}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Nick Name</label>
                          <p>{{$results->nick_name}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Gender</label>
                          <p>{{$results->gender}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Name</label>
                          <p>{{$results->firstName.' '.$results->lastName}}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Employee Login Username
                          </label>
                          <p>{{$results->username}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Mobile</label>
                          <p>{{$results->phone}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Email</label>
                          <p>{{$results->email}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Extension</label>
                          <p>{{$results->extension}}</p>
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
                    <h3 class="card-title">Personal  Information </h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">DOB</label>
                          <p>{{$results->dob}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Birthday</label>
                          <p>{{$results->birth_day}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Blood Group
                          </label>
                          <p>{{$results->blood_group}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Father's Name
                          </label>
                          <p>{{$results->father_name}}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Marital Status
                          </label>
                          <p>{{$results->marital_status}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Marriage Date
                          </label>
                          <p>{{$results->marital_date}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Spouse Name
                          </label>
                          <p>{{$results->spouse_name}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Nationality</label>
                          <p>{{$results->nationality}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Residential Status
                          </label>
                          <p>{{$results->residential_status}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Place Of Birth
                          </label>
                          <p>{{$results->place_of_birth}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Country Of Origin
                          </label>
                          <p>{{$results->country_of_origin}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Religion</label>
                          <p>{{$results->religion}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">International Employee
                          </label>
                          <p>{{$results->international_emp}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Physically Challenged
                          </label>
                          <p>{{$results->physically_challened}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Is Director
                          </label>
                          <p>{{$results->is_director}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Personal Email
                          </label>
                          <p>{{$results->personal_email }}</p>
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
                    <h3 class="card-title">Joining Details </h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Joined On</label>
                          <p>{{$results->joining_Date}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Confirmation Date</label>
                          <p>{{$results->join_confrimation_date}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Status</label>
                          <p>{{$results->joining_status}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Probation Period</label>
                          <p>{{$results->probation_period}}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Notice Period
                          </label>
                          <p>{{$results->notice_period}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Current Company Experience</label>
                          <p>{{$results->current_company_experience}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Previous Experience</label>
                          <p>{{$results->pre_company_experiecne}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Total Experience</label>
                          <p>{{$results->total_experience}}</p>
                        </div>
                      </div>
                    </div>

                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Referred By
                          </label>
                          <p>{{$results->referred_by}}</p>
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
                    <h3 class="card-title">Current Position </h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Division</label>
                          <p>{{$results->division}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Grade</label>
                          <p>{{$results->grade}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Department</label>
                          <p>{{$results->departmentName}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Location</label>
                          <p>{{$results->location}}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Designation
                          </label>
                          <p>{{$results->position_name}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Reporting To</label>
                          <p>{{$results->reporting}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Category</label>
                          <p>{{$results->role}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Attendance Marking Option</label>
                          <p>{{$results->attendance_marking_option}}</p>
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
                    <h3 class="card-title">Present Address</h3>
                    <div class="row row-cards">
                      <!-- 4 columns in a row -->
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Name</label>
                          <p>{{$results->extension}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Address</label>
                          <p>{{$results->address}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">City
                          </label>
                          <p>{{$results->city}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">State
                          </label>
                          <p>{{$results->state}}</p>
                        </div>
                      </div>
                    </div>
          
                    <!-- Add another row if more information is needed -->
                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Country
                          </label>
                          <p>{{$results->country}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Pincode
                          </label>
                          <p>{{$results->pin}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Phone1
                          </label>
                          <p>{{$results->phone1}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Phone2</label>
                          <p>{{$results->phone2}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="row row-cards">
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Ext
                          </label>
                          <p>{{$results->extension}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Fax
                          </label>
                          <p>{{$results->fax}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Mobile
                          </label>
                          <p>{{$results->phone}}</p>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="mb-3">
                          <label class="mt-2 form-label">Emial</label>
                          <p>{{$results->email}}</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- end --}}
        
        </div>
      </div>
    </div>
    
  @endsection