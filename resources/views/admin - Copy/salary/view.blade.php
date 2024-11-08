@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Payslip</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payslip</li>
                    </ul>
                </div>
                <div class="float-right col-auto ml-auto">
                    <div class="btn-group btn-group-sm">
                        {{-- <button class="btn btn-white">CSV</button> --}}
                        <a href="{{route('admin.employee.salary.invoice',$salary->id)}}"><button class="btn btn-white">PDF</button></a>
                        <a href="{{route('admin.employee.salary.invoice',$salary->id)}}"><button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="payslip-title">Payslip for the month of Feb 2019</h4>
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="{{asset('admin/assets/img/logo1.jpeg')}}" class="inv-logo" alt="">
                                <ul class="mb-0 list-unstyled">
                                    <li>Asv Consulting Services Pvt Ltd</li>
                                    <li>B06,H-169, Sector 63 Noida, U.P. 201301, India</li>
                                    <li> 0120 4465842, +91 93156 52636</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Payslip #{{$salary->id}}</h3>
                                    <ul class="list-unstyled">
                                        <li>Salary Month: <span>March, 2019</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-b-20">
                                <ul class="list-unstyled">
                                    <li><h5 class="mb-0"><strong>{{$salary->fname.' '.$salary->lname}}</strong></h5></li>
                                    <li><span>{{$salary->work_role}}</span></li>
                                    <li>Employee ID: {{$salary->employeeID}}</li>
                                    <li>Joining Date: {{$salary->joiningDate}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Basic Salary</strong> <span class="float-right">{{$salary->basic_salary}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">{{$salary->hra}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Conveyance</strong> <span class="float-right">{{$salary->conveyance}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Other Allowance</strong> <span class="float-right">{{$salary->other}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Earnings</strong> <span class="float-right"><strong>{{$salary->net_salary}} Rs</strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">{{$salary->tds}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Provident Fund</strong> <span class="float-right">{{$salary->pf}} Rs</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ESI</strong> <span class="float-right">{{$salary->esi}} Rs</span></td>
                                            </tr>
                                            {{-- <tr>
                                                <td><strong>Loan</strong> <span class="float-right">{{$salary->joiningDate}} Rs</span></td>
                                            </tr> --}}
                                            <tr>
                                                <td><strong>Total Deductions</strong> <span class="float-right"><strong>11 Rs</strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p><strong>Net Salary: {{$salary->joiningDate}} Rs</strong> (Fifty nine thousand six hundred and ninety eight only.)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    
</div> 
<!-- /Page Wrapper -->

@endsection
@section('script')

@endsection

         
      