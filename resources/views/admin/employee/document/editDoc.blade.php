<form id="edit-doc-form" enctype="multipart/form-data" class="mt-3 employee-details" style="display:none;">
    @csrf
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" name="employee_id" class="form-control" id="employeeID" required>
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
        <label for="file" class="form-label">Upload New File (if applicable)</label>
        <input type="file" name="file" class="form-control" id="file">
    </div>
    <div id="fileSection">
        <span id="fileName" style="font-weight: bold;"></span>
        <i id="deleteFile" class="fas fa-trash-alt" style="cursor: pointer; display:none;" title="Delete File"></i>
    </div>
    <div id="current-file"></div> <!-- Display the current file -->
    <div class="mb-3">
        <button type="button" id="cancel-file" class="btn btn-danger">Cancel File</button>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="isActive" class="form-check-input isActive" id="isActive" value="1">
        <label class="form-check-label" for="isActive">Active</label>
    </div>
    <button type="submit" class="btn btn-primary">Edit Document</button>
    <button type="button" id="cancele-edit-form" class="btn btn-secondary">Cancel</button>
</form>