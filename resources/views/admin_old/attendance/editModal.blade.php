<!-- Edit Modal for Status -->

<div id="editModal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Edit Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <form id="goalEditForm" method="PUT" >
                @csrf
                <input type="hidden" id="attendance_id" name="id">
                <div class="row">
                    <div class="form-group">
                        <label class="col-form-label" for="status">Status</label>
                        <select id="status" name="status" class="form-select">
                            {{-- <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="Leave">Leave</option> --}}
                        </select>
                    </div>
                </div>
                <div class="mt-3 modal-footer">
                   <button class="btn btn-primary submit-btn update">Update</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>