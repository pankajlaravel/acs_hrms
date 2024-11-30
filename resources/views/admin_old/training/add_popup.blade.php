<div id="add_training" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add New Training</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="trainingForm" method="POST">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Training Type</label>
                        <select class="form-select" name="training_type_id">
                           <option value="">Select One</option>
                           @foreach ($trainingType as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>
                              
                           @endforeach
                        </select>
                        <span class="error text-danger"  id="training_type_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Trainer</label>
                        <select class="form-select" name="trainer_id"> 
                           <option value="">Select One</option>
                           @foreach ($trainers as $val)
                           <option value="{{$val->id}}">{{$val->fname.' '.$val->lname}}</option>
                              
                           @endforeach
                        </select>
                        <span class="error text-danger"  id="trainer_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Employees</label>
                        <select class="form-select" name="emp_id">
                           <option value="">Select One</option>
                           @foreach ($employees as $val)
                           <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>  
                           @endforeach
                        </select>
                        <span class="error text-danger"  id="emp_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="trainer_cost">
                        <span class="error text-danger"  id="trainer_costError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Start Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" type="date" name="start_date">
                        <span class="error text-danger"  id="start_dateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">End Date <span class="text-danger">*</span></label>
                        <input class="form-control datetimepicker" type="date" name="end_date">
                        <span class="error text-danger"  id="end_dateError"></span>
                     </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="4" name="description"></textarea>
                        <span class="error text-danger"  id="descriptionError"></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-select" name="status">
                           <option value="0">Active</option>
                           <option value="1">Inactive</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_training">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>