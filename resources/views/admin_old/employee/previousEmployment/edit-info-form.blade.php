<div class="container mt-5">
    <form id="editEmploymentForm" method="PUT" style="display:none;">
        <h3>Edit Previous Employment Details</h3>
        @csrf
        <input type="hidden" id="id" name="id">
        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee ID</label>
            <input type="text" class="form-control employee_id" id="" name="employee_id" placeholder="Enter company name" disabled>
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            {{-- <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your designation" required> --}}
            <select name="designation_id" id="designation_id" class="form-control">
                <option value="">--Select One--</option>
                @foreach ($designation as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
              </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="from_date" class="form-label">From Date</label>
                <input type="date" class="form-control" id="from_date" name="from_date" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="to_date" class="form-label">To Date</label>
                <input type="date" class="form-control" id="to_date" name="to_date" required>
            </div>
        </div>
        <div class="row">
            <label for="relevant_experience" class="form-label">Relevant Experience</label>
        <div class="col-md-6 mb-3">
            <input type="number" class="form-control" id="relevant_experience_in_year" name="relevant_experience_in_year" placeholder="Enter experience in years" required>
        </div>
        <div class="col-md-6 mb-3">
        <input type="number" class="form-control" id="relevant_experience_in_month" name="relevant_experience_in_month" placeholder="Enter experience in months" required>
        </div>
    </div>
        <div class="mb-3">
            <label for="company_address" class="form-label">Company Address</label>
            <textarea class="form-control" id="company_address" name="company_address" rows="3" placeholder="Enter company address"></textarea>
        </div>
        <div class="mb-3">
            <label for="nature_of_duties" class="form-label">Nature of Duties</label>
            <textarea class="form-control" id="nature_of_duties" name="nature_of_duties" rows="3" placeholder="Describe your duties"></textarea>
        </div>
        <div class="mb-3">
            <label for="leaving_reason" class="form-label">Reason for Leaving</label>
            <input type="text" class="form-control" id="leaving_reason" name="leaving_reason" placeholder="Enter reason for leaving">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" id="cancele-edit-form" class="btn btn-secondary">Cancel</button>
    </form>
</div>