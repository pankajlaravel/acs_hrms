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
                        <h3 class="page-title">Welcome {{ auth()->user()->firstName }}</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- /Page Header -->
               <div class="mt-2 row">
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                           <div class="dash-widget-info">
                              <h3>{{count($project)}}</h3>
                              <span>Projects</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                           <div class="dash-widget-info">
                              <h3>{{count($client)}}</h3>
                              <span>Clients</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                           <div class="dash-widget-info">
                              <h3>{{count($leads)}}</h3>
                              <span>Leads</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                           <div class="dash-widget-info">
                              <h3>{{count($employee)}}</h3>
                              <span>Employees</span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="mt-3 col-6">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                           <div class="dash-widget-info">
                              <canvas id="userChart"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>

                  {{-- Project Graph --}}
                  <div class="mt-3 col-6">
                     <div class="card dash-widget">
                        <div class="card-body">
                           <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                           <div class="dash-widget-info">
                              <canvas id="projects"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
             
               {{-- <div class="row">
                  <div class="col-md-12">
                     <div class="card-group m-b-30">
                        <div class="card">
                           <div class="card-body">
                              <div class="mb-3 d-flex justify-content-between">
                                 <div>
                                    <span class="d-block">New Employees</span>
                                 </div>
                                 <div>
                                    <span class="text-success">4</span>
                                 </div>
                              </div>
                              <h3 class="mb-3">5</h3>
                              <div class="mb-2 progress" style="height: 5px;">
                                 <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">Overall Employees </p>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div class="mb-3 d-flex justify-content-between">
                                 <div>
                                    <span class="d-block">Earnings</span>
                                 </div>
                                 <div>
                                    <span class="text-success"></span>
                                 </div>
                              </div>
                              <h3 class="mb-3"> Rs.</h3>
                              <div class="mb-2 progress" style="height: 5px;">
                                 <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">Previous Month Rs. <span class="text-muted"> </span></p>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div class="mb-3 d-flex justify-content-between">
                                 <div>
                                    <span class="d-block">Expenses</span>
                                 </div>
                                 <div>
                                    <span class="text-danger"></span>
                                 </div>
                              </div>
                              <h3 class="mb-3"> Rs</h3>
                              <div class="mb-2 progress" style="height: 5px;">
                                 <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">Previous Month <span class="text-muted"> Rs</span></p>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <div class="mb-3 d-flex justify-content-between">
                                 <div>
                                    <span class="d-block">Profit</span>
                                 </div>
                                 <div>
                                    <span class="text-danger"></span>
                                 </div>
                              </div>
                              <h3 class="mb-3"> Rs</h3>
                              <div class="mb-2 progress" style="height: 5px;">
                                 <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mb-0">Previous Month <span class="text-muted">Rs</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> --}}
               <div class="mt-3 row">
                  <div class="col-md-12 d-flex">
                     <div class="card card-table flex-fill">
                        <div class="card-header">
                           <h3 class="mb-0 card-title">Recent Projects</h3>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 custom-table">
                                 <thead>
                                    <tr>
                                       <th>Project Name </th>
                                       {{-- <th>Progress</th> --}}
                                       {{-- <th class="text-right">Action</th> --}}
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($project as $index => $val )
                                    <tr>
                                       <td>
                                          <h2><a href="{{route('admin.project.view',$val->id)}}">{{$val->project_name}}</a></h2>
                                          <small class="block text-ellipsis">
                                          {{-- <span>1</span> <span class="text-muted">open tasks, </span>
                                          <span>9</span> <span class="text-muted">tasks completed</span> --}}
                                          </small>
                                       </td>
                                       <td>
                                          {{-- <div class="progress progress-xs progress-striped">
                                             <div class="progress-bar" role="progressbar" data-toggle="tooltip" title="65%" style="width: 65%"></div>
                                          </div>
                                       </td> --}}
                                       {{-- <td class="text-right">
                                          <div class="dropdown dropdown-action">
                                             <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                             </div>
                                          </div>
                                       </td> --}}
                                    </tr>
                                    @endforeach
                                    
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="{{route('admin.project')}}">View all projects</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          
         <script>
            const ctx = document.getElementById('userChart').getContext('2d');
            const userData = @json($userData);  // Pass PHP data to JavaScript
            // console.log(userData);
            // Prepare data for the chart
            const labels = userData.map(data => data.created_at);  // Labels (e.g., dates)
            const dataValues = userData.map(data => data.firstName.length);  // Example of a value (e.g., name length)
        
            // Create the chart
            const userChart = new Chart(ctx, {
                type: 'line',  // or 'bar', 'pie', etc.
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Employee Record',
                        data: dataValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        {{-- Project --}}
        <script>
         const project_ctx = document.getElementById('projects').getContext('2d');
         const project = @json($projects);  // Pass PHP data to JavaScript
         console.log(project);
         // Prepare data for the chart
         const project_labels = project.map(data => data.created_at);  // Labels (e.g., dates)
         const project_dataValues = project.map(data => data.project_name.length);  // Example of a value (e.g., name length)
     
         // Create the chart
         const project_userChart = new Chart(project_ctx, {
             type: 'line',  // or 'bar', 'pie', etc.
             data: {
                 labels: project_labels,
                 datasets: [{
                     label: 'Project Record',
                     data: project_dataValues,
                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
                     borderColor: 'rgba(75, 192, 192, 1)',
                     borderWidth: 1
                 }]
             },
             options: {
                 scales: {
                     y: {
                         beginAtZero: true
                     }
                 }
             }
         });
     </script>
@endsection
         
         
      