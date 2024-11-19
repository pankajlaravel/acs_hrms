<form id="add-doc-form" enctype="multipart/form-data" class="mt-3" style="display:none;">
    @csrf
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" name="employee_id" class="form-control" id="employee_id" required>
    </div>
    <div class="mb-3">
        <label for="doc_name" class="form-label">Document Name</label>
        <input type="text" name="doc_name" class="form-control" id="doc_name" required>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category" class="form-select" id="category" required>
            <option value="">Select Category</option>
            <option value="Aadhar">Aadhar</option>
            <option value="Pan">Pan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <input type="file" name="file" class="form-control" id="file" required>
    </div>
    <div class="mb-3">
        <button type="button" id="cancel-file" class="btn btn-danger">Cancel File</button>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="isActive" class="form-check-input" id="isActive" value="1">
        <label class="form-check-label" for="isActive">Active</label>
    </div>
    <button type="submit" class="btn btn-primary">Save Document</button>
    <button type="button" id="cancel-form" class="btn btn-secondary">Cancel</button>
</form>