@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
    <div class="hero-container">
        <div class="hero-text">
          <h1>{{$greeting}},</h1>
          <p>
            Let's do great things together. 
            <span role="img" aria-label="rocket">🚀</span> 
            <span role="img" aria-label="sparkles">✨</span>
          </p>
        </div>
        <div class="hero-image">
          <img src="{{$image}}" alt="Skyline illustration" /> <!-- Image file path -->
        </div>
      </div>
    
      <div class="home">
        <div>
          <div class="my-favourites">
            <h2 class="heading">My Favourites</h2>
            <div class="main-container">
              <div class="carousel-1-wrapper">
                <div class="carousel-1" id="carousel-1">
                  <div class="carousel-1-item" style="background-color: #E0E7FF;">
                    <div class="icon">👤</div>
                    <p class="title">Update Employee Data</p>
                  </div>
                  <div class="carousel-1-item" style="background-color: #FFEAD4;">
                    <div class="icon">🗂️</div>
                    <p class="title">Update Payroll Data</p>
                  </div>
                  <div class="carousel-1-item" style="background-color: #FFEAD4;">
                    <div class="icon">💼</div>
                    <p class="title">Process Payroll</p>
                  </div>
                  <div class="carousel-1-item" style="background-color: #FFEAD4;">
                    <div class="icon">📊</div>
                    <p class="title">Salary statement month</p>
                  </div>
                </div>
                <div class="scroll-buttons-container">
                  <button class="scroll-button" onclick="handleScroll('prev')">&#60;</button>
                  <button class="scroll-button" onclick="handleScroll('next')">&#62;</button>
                </div>
              </div>
            </div>
          </div>
    
          <div class="taskss">
            <h3>My Tasks</h3>
            <div class="my-tasks">
              <div class="left-panel">
                <img src="{{asset('admin/assets/img/task.jpeg')}}" alt="Tasks">
                <div class="review">6</div>
                <div class="text">Things to review</div>
                <div class="monitor">51</div>
                <div class="text">Things to monitor</div>
              </div>
              <div class="right-panel">
                <div class="task">
                  <div class="task-title">
                    <h3>Confirmation</h3>
                    <p>6 tasks pending for your review.</p>
                  </div>
                  <div class="task-action">Review</div>
                </div>
                <div class="task">
                  <div class="task-title">
                    <h3>Attendance Regularization</h3>
                    <p>24 tasks pending for others’ review.</p>
                  </div>
                  <div class="task-action">Monitor</div>
                </div>
                <div class="task">
                  <div class="task-title">
                    <h3>Leave</h3>
                    <p>22 tasks pending for others’ review.</p>
                  </div>
                  <div class="task-action">Monitor</div>
                </div>
                <div class="task">
                  <div class="task-title">
                    <h3>Restricted Holiday Leave</h3>
                    <p>5 tasks pending for others’ review.</p>
                  </div>
                  <div class="task-action">Monitor</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="latest-updates-card-unique">
          <div class="latest-updates-header-unique">
            <h3>Latest Updates</h3>
            <button class="latest-updates-see-more-unique">→</button>
          </div>
          <div class="latest-updates-item-unique">
            <p class="latest-updates-date-unique">12 Nov 2024</p>
            <p class="latest-updates-description-unique">
              Apply Leave on Behalf of Team with greytHR Mobile App
            </p>
          </div>
          <div class="latest-updates-item-unique">
            <p class="latest-updates-date-unique">10 Oct 2024</p>
            <p class="latest-updates-description-unique">
              Important Security Update for greytHR Mobile App – Effective October 17th
            </p>
          </div>
          <div class="latest-updates-item-unique">
            <p class="latest-updates-date-unique">08 Oct 2024</p>
            <p class="latest-updates-description-unique">
              Manage Resignations with greytHR ESS Mobile App
            </p>
          </div>
        </div>
      </div>
</div>
@endsection
         
         
      