@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

            <!-- Page Content -->
            <div class="page-wrapper">
				
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Hospital Admin</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Project</li>
								</ul>
							</div>
							{{-- <div class="float-right col-auto ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
								<a href="task-board.php" class="float-right btn btn-white m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
							</div> --}}
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="project-title">
										<h5 class="card-title">{{$project->project_name}}</h5>
					
									</div>
                                    <p>{{ $project->description }}</p>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
				                    <h5 class="card-title m-b-20">Uploaded image files</h5>
									<div class="row">

										<div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
											<div class="uploaded-box">
												<div class="uploaded-img">
													<img src="{{asset('projects/img/'.$project->picture)}}" class="img-fluid" alt="">
												</div>
												<div class="uploaded-img-name">
													 {{-- {{$project->picture}} --}}
												</div>
											</div>
										</div>
							
									</div>
								</div>
							</div>
						
						</div>
						<div class="col-lg-4 col-xl-3">
							{{-- <div class="card">
								<div class="card-body">
									<h6 class="card-title m-b-15">Project details</h6>
									<table class="table table-striped table-border">
										<tbody>
											<tr>
												<td>Cost:</td>
												<td class="text-right">$1200</td>
											</tr>
											<tr>
												<td>Total Hours:</td>
												<td class="text-right">100 Hours</td>
											</tr>
											<tr>
												<td>Created:</td>
												<td class="text-right">25 Feb, 2019</td>
											</tr>
											<tr>
												<td>Deadline:</td>
												<td class="text-right">12 Jun, 2019</td>
											</tr>
											<tr>
												<td>Priority:</td>
												<td class="text-right">
													<div class="btn-group">
														<a href="#" class="badge badge-danger dropdown-toggle" data-toggle="dropdown">Highest </a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>Created by:</td>
												<td class="text-right"><a href="profile.php">Barry Cuda</a></td>
											</tr>
											<tr>
												<td>Status:</td>
												<td class="text-right">Working</td>
											</tr>
										</tbody>
									</table>
									<p class="m-b-5">Progress <span class="float-right text-success">40%</span></p>
									<div class="mb-0 progress progress-xs">
										<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
									</div>
								</div>
							</div> --}}
							<div class="card project-user">
								<div class="card-body">
									<h6 class="card-title m-b-20">Assigned Leader</h6>
									<ul class="list-box">
										<li>
											<a href="javascript::void()">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar"><img alt="" src="{{asset('leads/img/'.$project->lead_img)}}"></span>
													</div>
													<div class="list-body">
														<span class="message-author">{{$project->lead_first_name.' '.$project->lead_last_name}}</span>
														<div class="clearfix"></div>
														<span class="message-content">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				

				
            </div>
            <!-- /Page Content -->
        
       

@endsection
@section('script')

@endsection

         
      