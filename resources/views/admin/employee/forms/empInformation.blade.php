

<div class="employee-information" id="empInformation" style="display: none;">
    <h3>Employee Information</h3>
    <form id="employeeInfoEditForm" method="PUT" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="employeeId" name="id">
      <input type="hidden" id="emp_image" name="emp_image">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Title</p>
        <div class="control">
          <select name="title"  class="form-control title" >
            <option value="Mr.">Mr.</option>
            <option value="Ms.">Ms.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Dr.">Dr.</option>
            <option value="Prof.">Prof.</option>
          </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Nik Name</p>
        <div class="control">
          <input name="nick_name" id="" class="form-control nick_name" type="text">
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">First Name</p>
        <div class="control">
          <input name="firstName"  class="form-control firstName" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Last Name</p>
        <div class="control">
          <input name="lastName"  class="form-control lastName" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Username</p>
        <div class="control">
          <input name="username"  class="form-control username" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Email</p>
        <div class="control">
          <input name="email"   class="form-control email" type="email" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Phone</p>
        <div class="control">
          <input name="phone"  class="form-control phone" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Gender</p>
        <div class="control">
          <select name="gender" class="form-control gender" >
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Extension</p>
        <div class="control">
          <input class="form-control extension"  name="extension" type="text" >
        </div>
      </div>
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelEpmInfoFrom" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>
   
  
   