    

<div class="employee-information" id="empAddress" style="display: none;">
    <h3>Present Address</h3>
    <form id="employeePresentAddressEditForm" method="PUT" enctype="multipart/form-data">
      @csrf
      <input type="hidden" class="employeeId" name="id">
    <div class="details-container">
      
      <div class="detail-item">
        <p class="detail-label">Address</p>
        <div class="control">
            <input name="address" class="form-control address" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">City</p>
        <div class="control">
        <input name="city"  class="form-control city" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">State</p>
        <div class="control">
            <input name="state" class="form-control state" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Country</p>
        <div class="control">
            <input name="country"  class="form-control country" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Pincode</p>
        <div class="control">
            <input name="pin" id="" class="form-control pin" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Phone1</p>
        <div class="control">
            <input name="phone1" id="" class="form-control phone1" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Phone2</p>
        <div class="control">
            <input name="phone2" id="" class="form-control phone2" type="text" >
        </div>
      </div>
      <div class="detail-item">
        <p class="detail-label">Ext</p>
        <div class="control">
            <input class="form-control extension" id="" name="extension" type="text" >
        </div>
      </div>

      <div class="detail-item">
        <p class="detail-label">Fax</p>
        <div class="control">
            <input class="form-control fax" id="" name="fax" type="text" >
        </div>
      </div>

      
      
    </div>
    <div class="mt-5 form-actions">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="button" id="cancelAddressForm" class="btn btn-secondary btn-sm" >Cancel</button>
    </div>
    </form>
    <!-- Save and Cancel Buttons -->
    
  </div>
   
  
   