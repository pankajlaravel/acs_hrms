<div id="edit_promotion" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Promotion</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="promorteEditForm" method="PUT">
               @csrf
               <input type="hidden" id="prom_id" name="id">
               <div class="form-group">
                  <label class="form-label mt-2">Employee Name<span class="text-danger">*</span></label>
                  <input class="form-control emp_name" type="text" name="emp_id" readonly>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion For <span class="text-danger">*</span></label>
                  <input class="form-control promotion_for" name="promotion_for" type="text" >
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion From <span class="text-danger">*</span></label>
                  <input class="form-control promotion_from" type="text" name="promotion_from" readonly="">
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion To <span class="text-danger">*</span></label>
                  <select class="form-select promotion_to" name="promotion_to">
                     @foreach ($designation as $val)
                     <option value="{{$val->id}}" >{{$val->name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion Date <span class="text-danger">*</span></label>
   
                     <input type="text" name="promotion_date" id="datetime" class="form-control datetimepicker promotion_date">

               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Status<span class="text-danger">*</span></label>
                  <select class="form-select prom_status" name="status">
                    
                  </select>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>