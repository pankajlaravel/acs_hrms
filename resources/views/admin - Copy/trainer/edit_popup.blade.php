<div id="edit_trainer" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Trainer</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="trainerEditForm" method="PUT" enctype="multipart/form-data">
               @csrf
               <input type="hidden" id="trainerId" name="id">
               <input type="hidden" id="trainer_image" name="emp_image">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="fname" name="fname">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input class="form-control" type="text" name="lname" id="lname">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Role <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="role" id="role">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" id="email">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input class="form-control" type="text" name="phone" id="phone">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-select trainer_status" name="status">
                           {{-- <option>Active</option>
                           <option>Inactive</option> --}}
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" name="description" id="description" required></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Picture </label>
                        <input class="form-control" type="file" name="picture" id="trainer_image">
                        <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>