
<div id="edit_lead" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Lead</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form  id="leadEditForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="leadId" name="id">
            <input type="hidden" id="lead_image" name="lead_image">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger" >*</span></label>
                        <input name="firstName" id="firstName"  class="form-control" type="text">
                        <span class="error text-danger"  id="firstnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input name="lastName" id="lastName" class="form-control" type="text">
                        <span class="error text-danger" id="lastnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                 
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="email" id="email"  class="form-control" type="email">
                        <span class="error text-danger" id="emailError"></span> <!-- Error message area -->
                     </div>
                  </div>
                 
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input name="phone" id="phone" class="form-control" type="text">
                        <span class="error text-danger" id="phoneError"></span> <!-- Error message area -->
                     </div>
                  </div>
                
                  
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Client Picture</label>
                        <input class="form-control" id="picture"  name="picture" type="file">
                        <span class="error text-danger" id="pictureError"></span> <!-- Error message area -->
                     </div>
                     <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button type="submit"  class="btn btn-primary submit-btn updating">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>