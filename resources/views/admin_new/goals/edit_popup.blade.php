<div id="edit_goal" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Goal Tracking</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="goalEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="goal_id" name="id">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Goal Type</label>
                        <select class="form-select goal_name" name="goal_type_id">
                           @foreach ($goalTypes as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>  
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Subject</label>
                        <input class="form-control subject" type="text" name="subject" id="subject">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Target Achievement</label>
                        <input class="form-control target_achievement" type="text" name="target_achievement" id="target_achievement">
                     </div>
                  </div>
                  
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Start Date <span class="text-danger">*</span></label>
                        <input class="form-control start_date" name="start_date" id="start_date" type="text">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">End Date <span class="text-danger">*</span></label>
                         <input class="form-control end_date" name="end_date" id="end_date" type="text">
                     </div>
                  </div>
                  {{-- <div class="mb-3 col-sm-12">
                     <div class="form-group">
                        <label for="customRange">Progress</label>
                        <input type="range" class="form-control-range custom-range" id="customRange">
                        <div class="mt-2" id="result">Progress Value: <b></b></div>
                     </div>
                  </div> --}}
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control description" rows="4" name="description" id="description"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-select goal_status" name="status" id="status">
                           
                        </select>
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