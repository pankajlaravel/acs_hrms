    

<div class="employee-information" id="empCurrentPosition" style="display: none;">
    <h3>Current Position</h3>
    <form id="employeePositionEditForm" method="PUT" enctype="multipart/form-data">
      @csrf
      <input type="hidden" class="employeeId" name="id">
    <div class="details-container">
      <div class="detail-item">
        <p class="detail-label">Division</p>
        <div class="control">
            <input name="division" class="form-control division" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Grade</p>
        <div class="control">
            <input name="grade" class="form-control grade" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Department</p>
        <div class="control">
          <select name="department_id" id="" class="form-control department_id">
            @foreach ($department as $val)
              
            <option value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Designation</p>
        <div class="control">
          <select name="designation_id" id="" class="form-control designation_id" >
            @foreach ($designation as $val)
              
            <option value="{{$val->id}}">{{$val->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Location</p>
        <div class="control">
            <input name="location"  class="form-control location" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Reporting To</p>
        <div class="control">
            <input name="reporting" id="" class="form-control reporting" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Category</p>
        <div class="control">
            <input name="role" id="" class="form-control role" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Attendance Marking Option</p>
        <div class="control">
            <input name="attendance_marking_option" id="" class="form-control attendance_marking_option" type="text" >
        </div>
      </div>
      
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelPositionForm" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>
   
  
   