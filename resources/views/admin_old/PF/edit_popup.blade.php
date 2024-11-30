<div id="edit_pf" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Provident Fund</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="pfEditForm" method="PUT" >
               @csrf
               <input type="hidden" id="pf_id" name="id">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Employee Name</label>
                        <select class="form-control select emp_name" name="emp_id">
                           @foreach ($employees as $val)
                        <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>
                           
                        @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Provident Fund Type</label>
                         <select class="form-control select pf_type" name="pf_type" >
                           
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="show-fixed-amount">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Employee Share (Amount)</label>
                                 <input class="form-control" type="text" name="emp_share_amt" id="emp_share_amt">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Organization Share (Amount)</label>
                                 <input class="form-control" type="text" name="org_share_amt" id="org_share_amt">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="show-basic-salary">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Employee Share (%)</label>
                                 <input class="form-control" type="text" name="emp_share_persant" id="emp_share_persant">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Organization Share (%)</label>
                                 <input class="form-control" type="text" name="org_share_persant" id="org_share_persant">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description</label>
                        <textarea class="form-control" rows="4" name="description" id="description"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Status</label>
                         <select class="form-control select status" name="status" >
                           
                        </select>
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn updating">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>