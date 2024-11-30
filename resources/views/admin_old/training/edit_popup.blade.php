<div id="edit_training" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Training List</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="trainingEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="trainingId" name="id">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Training Type</label>
                        <select class="form-select typeName" name="training_type_id">
                           @foreach ($trainingType as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>
                              
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Trainer</label>
                        <select class="form-select trainerName" name="trainer_id" >
                           @foreach ($trainers as $val)
                           <option value="{{$val->id}}">{{$val->fname.' '.$val->lname}}</option>
                              
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Employees</label>
                        <select class="form-select emp_name" name="emp_id">
                           <option value="">Select One</option>
                           @foreach ($employees as $val)
                           <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>  
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="trainer_cost" id="trainer_cost">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Start Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" name="start_date" id="start_date" type="data">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">End Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" name="end_date" id="end_date" type="data"></div>
                     </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" name="description" id="training_description"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-select training_status" name="status">
                          
                        </select>
                     </div>
                  </div>
                  <div class="modal-footer mt-3">
                     <button class="btn btn-primary submit-btn update">Submit</button>
                  </div>
               </div>
               
            </form>
         </div>
      </div>
   </div>
</div>