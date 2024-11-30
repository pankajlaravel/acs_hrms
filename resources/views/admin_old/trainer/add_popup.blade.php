<div id="add_trainer" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add New Trainer</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="trainerForm" method="PUT">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="fname">
                        <span class="error text-danger"  id="fnameError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input class="form-control" type="text" name="lname">
                        <span class="error text-danger"  id="lnameError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Role <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="role">
                        <span class="error text-danger"  id="roleError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email">
                        <span class="error text-danger"  id="emailError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input class="form-control" type="text" name="phone">
                        <span class="error text-danger"  id="phoneError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Picture</label>
                        <input class="form-control" type="file" name="picture">
                        <span class="error text-danger" id="pictureError"></span> <!-- Error message area -->   
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" name="description"></textarea>
                        <span class="error text-danger"  id="descriptionError"></span>
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_trainer">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>