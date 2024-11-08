
<div id="add_lead" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Lead</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form data-action='{{route("admin.lead.store")}}' id="leadForm" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">First Name <span class="text-danger" >*</span></label>
                        <input name="firstName"  class="form-control" type="text">
                        <span class="error text-danger"  id="firstnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Last Name</label>
                        <input name="lastName" class="form-control" type="text">
                        <span class="error text-danger" id="lastnameError"></span> <!-- Error message area -->
                     </div>
                  </div>
                 
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Email <span class="text-danger" id="firstnameError">*</span></label>
                        <input name="email"  class="form-control" type="email">
                        <span class="error text-danger" id="emailError"></span> <!-- Error message area -->
                     </div>
                  </div>
                 
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Phone </label>
                        <input name="phone"  class="form-control" type="text">
                        <span class="error text-danger" id="phoneError"></span> <!-- Error message area -->
                     </div>
                  </div>
                
                  
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="col-form-label">Client Picture</label>
                        <input class="form-control"  name="picture" type="file">
                        <span class="error text-danger" id="pictureError"></span> <!-- Error message area -->
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button type="submit"  class="btn btn-primary submit-btn addData">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>