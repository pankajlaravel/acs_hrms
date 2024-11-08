<div id="edit_salary" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Staff Salary</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="salaryEditForm" method="POST">
               @csrf
               <input type="hidden" name="id" class="salaryID" id="salaryID">
               <div class="row"> 
                  <div class="col-sm-6"> 
                     <div class="form-group">
                        <label class="form-label mt-2">Select Staff</label>
                        <select name="emp_id"  class="form-select emp_name"> 
                          
                           @foreach ($employees as $val)
                              <option value="{{$val->id}}">{{$val->firstName.' '.$val->lastName}}</option>
                           @endforeach
                        </select>
                        <span class="error text-danger" id="emp_idError"></span>
                     </div>
                  </div>
                  <div class="col-sm-6"> 
                     <label class="form-label mt-2">Net Salary</label>
                     <input class="form-control net_salary" type="text" name="net_salary" id="net_salary">
                  </div>
               </div>
               <div class="row"> 
                  <div class="col-sm-6"> 
                     <h4 class="text-primary">Earnings</h4>
                     <div class="form-group">
                        <label class="form-label mt-2">Basic</label>
                        <input class="form-control basic_salary" type="text" name="basic_salary" id="basic_salary">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">DA(40%)</label>
                        <input class="form-control da" type="text" name="da" id="da">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">HRA(15%)</label>
                        <input class="form-control hra" type="text" name="hra" id="hra">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Conveyance</label>
                        <input class="form-control conveyance" type="text" name="conveyance" id="conveyance">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Allowance</label>
                        <input class="form-control allowance" type="text" name="allowance" id="allowance">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Medical  Allowance</label>
                        <input class="form-control medical_allowance" type="text" name="medical_allowance" id="medical_allowance">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Others</label>
                        <input class="form-control other" type="text" name="other" id="other">
                     </div>
                     {{-- <div class="add-more">
                        <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                     </div> --}}
                  </div>
                  <div class="col-sm-6">  
                     <h4 class="text-primary">Deductions</h4>
                     <div class="form-group">
                        <label class="form-label mt-2">TDS</label>
                        <input class="form-control tds" type="text" name="tds" id="tds">
                     </div> 
                     <div class="form-group">
                        <label class="form-label mt-2">ESI</label>
                        <input class="form-control" type="text" name="esi" id="esi">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">PF</label>
                        <input class="form-control pf" type="text" name="pf" id="pf">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Leave</label>
                        <input class="form-control leave" type="text" name="leave" id="leave">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Prof. Tax</label>
                        <input class="form-control prof_tax" type="text" name="prof_tax" id="prof_tax">
                     </div>
                     <div class="form-group">
                        <label class="form-label mt-2">Labour Welfare</label>
                        <input class="form-control labour_welfare" type="text" name="labour_welfare" id="labour_welfare">
                     </div>
                     
                  </div>
               </div>
               <div class="modal-footer mt-3">
                  <button class="btn btn-primary submit-btn update_btn">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>