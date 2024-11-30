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
								<h3 class="page-title">Invoice</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Invoice</li>
								</ul>
							</div>
							<div class="float-right col-auto ml-auto">
								<div class="btn-group btn-group-sm">
									{{-- <button class="btn btn-white">CSV</button> --}}
									<a href="{{route('admin.invoice.print',$invoice[0]->id)}}"><button class="btn btn-white">PDF</button></a>
									<a href="{{route('admin.invoice.print',$invoice[0]->id)}}"></a><button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6 m-b-20">
											<img src="../assets/img/logo2.png" class="inv-logo" alt="">
				 							<ul class="list-unstyled">
												<li>Asv Consulting Services Pvt Ltd</li>
												<li>3864 Quiet Valley Lane,</li>
												<li>Sherman Oaks, CA, 91403</li>
												<li>GST No:</li>
											</ul>
										</div>
										<div class="col-sm-6 m-b-20">
											<div class="invoice-details">
												<h3 class="text-uppercase">Invoice {{$invoice[0]->invoice_id}}</h3>
												<ul class="list-unstyled">
													<li>Date: <span>{{ \Carbon\Carbon::parse($invoice[0]->invoice_date)->format('F j, Y') }}</span></li>
													<li>Due date: <span>{{ \Carbon\Carbon::parse($invoice[0]->due_date)->format('F j, Y') }}</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
											<h5>Invoice to:</h5>
				 							<ul class="list-unstyled">
												<li><h5><strong>{{$invoice[0]->fname.' '.$invoice[0]->lname}}</strong></h5></li>
												<li><span>{{$invoice[0]->cname}}</span></li>
												<li>{{$invoice[0]->address}}</li>
												<li><a href="javascript::void()">{{$invoice[0]->email}}</a></li>
											</ul>
										</div>
										<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
											<span class="text-muted">Payment Details:</span>
											<ul class="list-unstyled invoice-payment-details">
												<li><h5>Total Due: <span class="text-right">Rs.{{$invoice[0]->grand_total}}</span></h5></li>
												{{-- <li>Bank name: <span>Profit Bank Europe</span></li>
												<li>Country: <span>United Kingdom</span></li>
												<li>City: <span>London E1 8BF</span></li>
												<li>Address: <span>3 Goodman Street</span></li>
												<li>IBAN: <span>KFH37784028476740</span></li>
												<li>SWIFT code: <span>BPT4E</span></li> --}}
											</ul>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>ITEM</th>
													<th class="d-none d-sm-table-cell">DESCRIPTION</th>
													<th>UNIT COST</th>
													<th>QUANTITY</th>
													<th class="text-right">TOTAL</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($itemsArray as $index => $val )
                                                <tr>
													<td>{{$index+1}}</td>
													<td>{{$val['item']}}</td>
													<td class="d-none d-sm-table-cell">{{$val['description']}}</td>
													<td>Rs.{{$val['unit_cost']}}</td>
													<td>{{$val['qty']}}</td>
													<td class="text-right">Rs.{{$val['amount']}}</td>
												</tr>
                                                @endforeach
												
												
											</tbody>
										</table>
									</div>
									<div>
										<div class="row invoice-payment">
											<div class="col-sm-7">
											</div>
											<div class="col-sm-5">
												<div class="m-b-20">
													<div class="table-responsive no-border">
														<table class="table mb-0">
															<tbody>
																<tr>
																	<th>Subtotal:</th>
																	<td class="text-right">Rs.{{$invoice[0]->total_amount}}</td>
																</tr>
																<tr>
																	<th>Tax: <span class="text-regular">(%)</span></th>
																	<td class="text-right">{{$invoice[0]->tax_percentage}} %</td>
																</tr>
																<tr>
																	<th>Total:</th>
																	<td class="text-right text-primary"><h5>Rs.{{$invoice[0]->grand_total}}</h5></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="invoice-info">
											<h5>Other information</h5>
											<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero, eu finibus sapien interdum vel</p>
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

         
      