

<div class="page-wrapper">
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        
      <div class="col-lg-12">
        <div class="row row-cards">
          <div class="col-12">
            <form class="card" id="addFamaliyForm" method="POST">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Add Family</h3>
                    <div class="row row-cards">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                <input type="text" name="emp_id" id="emp_id" value="{{$employee_id}}">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                      <label class="form-label mt-2">Profession</label>
                      <input type="text" name="profession" class="form-control" placeholder="Profession">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                      <label class="form-label mt-2">DOB</label>
                      <input type="date" name="dob" class="form-control" placeholder="Date of birth">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label mt-2">Nationality</label>
                      <input type="text" name="nationality" class="form-control" placeholder="Nationality" >
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label mt-2">Remarks</label>
                      <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label mt-2">Gender</label>
                        <select class="form-control form-select" name="gender">
                          <option value="">--Select one--</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-3 ">
                    <div class="mb-3">
                        <label class="form-label mt-2">Blood Group
                        </label>
                        <select class="form-control form-select" name="blood_group">
                            <option value="">--Select one--</option>
                            <option value="A +ve">A +ve</option>
                            <option value="A -ve">A -ve</option>
                            <option value="B +ve">B +ve</option>
                            <option value="B -ve">B -ve</option>
                            <option value="AB +ve">AB +ve</option>
                            <option value="AB -ve">AB -ve</option>
                            <option value="O +ve">O +ve</option>
                            <option value="O -ve">O -ve</option>
                        </select>
                      </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                      <label class="form-label mt-2">Relation</label>
                      <select class="form-control form-select">
                        <option value="">--Select one--</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Son">Son</option>
                        <option value="Daughter">Daughter</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Grandfather">Grandfather</option>
                        <option value="Grandmother">Grandmother</option>
                        <option value="Uncle">Uncle</option>
                        <option value="Aunt">Aunt</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
    