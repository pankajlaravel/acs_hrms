@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

            <!-- Page Content -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="mb-0 card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="">
													<img src="{{asset('clients/img/'.$client->picture)}}" alt="{{$client->picture}}">
												</a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0">{{$client->company_name}}</h3>
														<h5 class="mb-0 company-role m-t-0">{{$client->firstName.' '.$client->lastName}}</h5>
														{{-- <small class="text-muted">CEO</small> --}}
														<div class="staff-id">Employee ID : {{$client->client_id}}</div>
														{{-- <div class="staff-msg"><a href="chat.php" class="btn btn-custom">Send Message</a></div> --}}
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<span class="title">Phone:</span>
															<span class="text"><a href="">{{$client->phone}}</a></span>
														</li>
														<li>
															<span class="title">Email:</span>
															<span class="text"><a href="">{{$client->email}}</a></span>
														</li>
														<li>
															{{-- <span class="title">Birthday:</span>
															<span class="text">2nd August</span> --}}
														</li>
														<li>
															<span class="title">Address:</span>
															<span class="text">{{$client->address}}</span>
														</li>
														<li>
															{{-- <span class="title">Gender:</span>
															<span class="text">Male</span> --}}
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
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

         
      