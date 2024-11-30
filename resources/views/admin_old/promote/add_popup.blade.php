<div id="add_promotion" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Promotion</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="promotionForm" method="POST">
               @csrf
               <div class="form-group">
                  <label class="form-label mt-2">Employee Name<span class="text-danger">*</span></label>
                  <select class="form-select emp_data" name="emp_id">
                     <option value="">Select one</option>
                     @foreach ($employees as $val )
                     <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option> 
                     @endforeach
                  </select>
                  <span class="error text-danger"  id="emp_idError"></span>
               </div>
               
               <div class="form-group">
                  <label class="form-label mt-2">Promotion From <span class="text-danger">*</span></label>
                  <input class="form-control designation" type="text"  readonly="" name="promotion_from">
                  <span class="error text-danger"  id="promotion_fromError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion To <span class="text-danger">*</span></label>
                  <select class="form-select" name="promotion_to">
                     <option value="">Select one</option>
                     @foreach ($designation as $val)
                     <option value="{{$val->id}}" >{{$val->name}}</option>
                     @endforeach
                  </select>
                  <span class="error text-danger"  id="promotion_toError"></span>
               </div>
               <div class="form-group">
                  <label class="form-label mt-2">Promotion Date <span class="text-danger">*</span></label>
                  <div class="cal-icon">
                     <input type="text" class="form-control datetimepicker" id="datetime" name="promotion_date">
                     <span class="error text-danger"  id="promotion_dateError"></span>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_data">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>