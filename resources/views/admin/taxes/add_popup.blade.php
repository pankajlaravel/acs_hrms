<div id="add_tax" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Tax</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="taxForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Tax Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="name" type="text">
                  <span class="error text-danger"  id="name_nameError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Tax Percentage (%) <span class="text-danger">*</span></label>
                  <input class="form-control" name="percentage" type="text">
                  <span class="error text-danger"  id="percentage_dateError"></span>
               </div>
               {{-- <div class="form-group">
                  <label class="form-label mt-2">Status <span class="text-danger">*</span></label>
                  <select class="form-select">
                     <option>Pending</option>
                     <option>Approved</option>
                  </select>
               </div> --}}
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_data">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>