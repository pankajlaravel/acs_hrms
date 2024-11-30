<div id="add_goal" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Goal Tracking</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="goalForm" method="POST">
               @csrf
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Goal Type</label>
                        <select name="goal_type_id" class="form-select">
                           <option value="">Select Goal Type</option>
                           @foreach ($goalTypes as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>  
                           @endforeach
                        </select>
                        <span class="error text-danger" id="goal_type_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Subject</label>
                        <input  name="subject" class="form-control" type="text">
                        <span class="error text-danger" id="subjectError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Target Achievement</label>
                        <input  name="target_achievement" class="form-control" type="text">
                        <span class="error text-danger" id="target_achievementError"></span>
                     </div>
                  </div>
                  
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Start Date </label>
                        <input  name="start_date" class="form-control " type="date">
                        <span class="error text-danger" id="start_dateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">End Date <span class="text-danger">*</span></label>
                        <input  name="end_date" class="form-control " type="date">
                        <span class="error text-danger" id="end_dateError"></span>
                     </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description</label>
                        <textarea name="description" class="form-control" rows="4"></textarea>
                        <span class="error text-danger" id="descriptionError"></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     {{-- <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select name="status" class="form-select">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                     </div> --}}

                     {{-- <div class="col-sm-6">
                        <div class="form-group">
                           <label hidden class="col-form-label">Progress</label>
                           <input hidden name="progress" value="" class="form-control" type="text">
                        </div>
                     </div> --}}
                     
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button type="submit" name="add_goal" class="btn btn-primary submit-btn add_goal">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>