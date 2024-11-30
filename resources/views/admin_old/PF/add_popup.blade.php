<div id="add_pf" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Provident Fund</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="add_PF_Form" method="POST">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Employee Name</label>
                     <select class="form-control select" name="emp_id">
                        <option value="">Select one name</option>
                        @foreach ($employees as $val)
                        <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>
                           
                        @endforeach
                           {{-- <option value="23">Richard Miles (FT-0002)</option> --}}
                        </select>
                        <span class="error text-danger" id="emp_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label class="form-label mt-2">Provident Fund Type</label>
                         <select class="form-control select" name="pf_type">
                           <option value="">Select One</option>
                           <option value="0" selected="">Fixed Amount</option>
                           <option value="1">Percentage of Basic Salary</option>
                        </select>
                        <span class="error text-danger" id="pf_typeError"></span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="show-fixed-amount">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Employee Share (Amount)</label>
                                 <input class="form-control" type="text" name="emp_share_amt">
                                 <span class="error text-danger" id="emp_share_amtError"></span>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Organization Share (Amount)</label>
                                 <input class="form-control" type="text" name="org_share_amt">
                                 <span class="error text-danger" id="org_share_amtError"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="show-basic-salary">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Employee Share (%)</label>
                                 <input class="form-control" type="text" name="emp_share_persant">
                                 <span class="error text-danger" id="emp_share_persantError"></span>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="form-label mt-2">Organization Share (%)</label>
                                 <input class="form-control" type="text" name="org_share_persant">
                                 <span class="error text-danger" id="org_share_persantError"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="form-label mt-2">Description</label>
                        <textarea  class="form-control" rows="4" name="description"></textarea>
                        <span class="error text-danger descriptionameError"></span>
                     </div>
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn add_pf">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>