<div id="edit_tax" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Tax</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="taxEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="tax_id" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Tax Name <span class="text-danger">*</span></label>
                  <input class="form-control" name="name" id="name" type="text">
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Tax Percentage (%) <span class="text-danger">*</span></label>
                  <input class="form-control" name="percentage" id="percentage" type="text">
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Status <span class="text-danger">*</span></label>
                  <select class="form-select" name="status" id="status">
                     
                  </select>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update_data">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>