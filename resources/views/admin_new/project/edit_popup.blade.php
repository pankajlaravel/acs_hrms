<div id="edit_project" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Project</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form  id="projectEditForm" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" id="projectID" class="projectID">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Project Name</label>
                        <input class="form-control project_name" name="project_name"  type="text">
                        <span class="error text-danger"  id="project_nameError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Client</label>
                        <select name="client_id"  class="form-select client_name">
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
                        <input name="start_date" id="start_date" class="form-control start_date" type="date">
                        <span class="error text-danger"  id="start_dateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">End Date</label>
                        <input name="end_date" id="end_date" class="form-control end_date" type="date">
                        <span class="error text-danger"  id="end_dateError"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label class="mt-2 form-label">Rate</label>
                        <input name="rate" id="rate" placeholder="$50" class="form-control rate" type="text">
                        <span class="error text-danger"  id="rateError"></span>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label class="mt-2 form-label">&nbsp;</label>
                        <select name="rate_type" id="rate_type_result" class="form-select rate_type_result">
                           {{-- <option value="Hourly">Hourly</option>
                           <option value="Fixed">Fixed</option> --}}
                        </select>
                        <span class="error text-danger"  id="rate_typeError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select priority">
{{--                           
                           <option value="High">High</option>
                           <option value="Medium">Medium</option>
                           <option value="Low">Low</option> --}}
                        </select>
                        <span class="error text-danger"  id="priorityError"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="mt-2 form-label">Add Project Leader</label>
                        <select name="lead_id" class="form-select lead_name">
   
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
                        <input name="project_id"   class="form-control project_id" type="text" readonly>
                        {{-- <span class="error text-danger"  id="project_idError"></span> --}}
                     </div>
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="mt-2 form-label">Description</label>
                  <textarea name="description" id="description" rows="4" class="form-control summernote description" placeholder="Enter your message here"></textarea>
                  <span class="error text-danger"  id="descriptionError"></span>
               </div>
               <div class="form-group">
                  <label class="mt-2 form-label">Upload Files</label>
                  <input name="picture" id="picture" class="form-control" type="file">
                  <span class="error text-danger"  id=""></span>
                  <img id="previewImage" src="" alt="User Image" class="img-fluid" style="display:none;" height="80px" width="100px">
               </div>
               
               <div class="mt-3 modal-footer">
                  <button class="btn btn-primary submit-btn updating">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>