<div id="create_project" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Create Project</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form data-action='{{route("admin.project.store")}}' id="projectForm" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Project Name</label>
                        <input class="form-control" name="project_name" id="project_name" type="text">
                        <span class="error text-danger"  id="project_nameError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Client</label>
                        <select name="client_id" id="client_id" class="form-select">
                        <option value="">Select Clients</option>
                        @foreach ($clients as $val)
                           <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>
                        @endforeach
                        </select>
                        <span class="error text-danger"  id="client_idError"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Start Date</label>
                        <input name="start_date" id="start_date" class="form-control" type="date">
                        <span class="error text-danger"  id="start_dateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">End Date</label>
                        <input name="end_date" id="end_date" class="form-control" type="date">
                        <span class="error text-danger"  id="end_dateError"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label class="mt-2 form-label">Rate</label>
                        <input name="rate" id="rate" placeholder="$50" class="form-control" type="text">
                        <span class="error text-danger"  id="rateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label class="mt-2 form-label">&nbsp;</label>
                        <select name="rate_type"  class="form-select">
                           <option value="">Select Type</option>
                           <option value="Hourly">Hourly</option>
                           <option value="Fixed">Fixed</option>
                        </select>
                        <span class="error text-danger"  id="rate_typeError"></span>
                     </div>
                  </div>
                  
                  {{-- <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select">
                           <option value="">Select Priority</option>
                           <option value="High">High</option>
                           <option value="Medium">Medium</option>
                           <option value="Low">Low</option>
                        </select>
                        <span class="error text-danger"  id="priorityError"></span>
                     </div>
                  </div> --}}

                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Priority</label>
                        <select name="priority"  class="form-select">
                           <option>High</option>
                           <option>Medium</option>
                           <option>Low</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Add Project Leader</label>
                        <select name="lead_id"  class="form-select">
                           <option value="">Select Project Leader</option>
                           @foreach ($leads as $val)
                           <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>
                              
                           @endforeach
                        </select>
                        <span class="error text-danger"  id="lead_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Project ID</label>
                        <input name="project_id" value="{{ 'PRO-'.$projectId}}" id="project_id" class="form-control" type="text" readonly>
                        {{-- <span class="error text-danger"  id="project_idError"></span> --}}
                     </div>
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="mt-2 form-label">Description</label>
                  <textarea name="description" id="description" rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
                  <span class="error text-danger"  id="descriptionError"></span>
               </div>
               <div class="form-group">
                  <label class="mt-2 form-label">Upload Files</label>
                  <input name="picture" id="picture" class="form-control" type="file">
                  <span class="error text-danger"  id=""></span>
               </div>
               
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn addData">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>