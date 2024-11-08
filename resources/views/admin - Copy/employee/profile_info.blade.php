
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

          {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-form" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                            <input required type="search" id="search" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
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
          
          {{--  --}}
          <div id="search-results" style="display: none;">
          
        </div>
        
        </div>
      </div>
    </div>
    <footer class="footer footer-transparent d-print-none">
      <div class="container-xl">
        <div class="flex-row-reverse text-center row align-items-center">
          <div class="col-lg-auto ms-lg-auto">
            <ul class="mb-0 list-inline list-inline-dots">
              <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
              <li class="list-inline-item"><a href="license.html" class="link-secondary">License</a></li>
              <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
              <li class="list-inline-item">
                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                  <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink icon-filled icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                  Sponsor
                </a>
              </li>
            </ul>
          </div>
          <div class="mt-3 col-12 col-lg-auto mt-lg-0">
            <ul class="mb-0 list-inline list-inline-dots">
              <li class="list-inline-item">
                Copyright &copy; 2024
                <a href="error-404.html" class="link-secondary">Tabler</a>.
                All rights reserved.
              </li>
              <li class="list-inline-item">
                <a href="changelog.html" class="link-secondary" rel="noopener">
                  v1.0.0-beta21
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
 @include('admin.employee.edit_popup')
  @endsection