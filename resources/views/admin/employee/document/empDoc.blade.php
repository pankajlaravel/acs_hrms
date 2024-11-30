
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="content">
   
          {{-- Search --}}
          <div class="employee-search-container">
            <div class="employee-search-content">
              <h4>Start searching to see specific employee details here</h4>
              <div class="employee-type-container">
        
              </div>
              <form id="search-doc-info" method="post" >
                @csrf
              <div class="employee-search-bar">
                
                <div class="search-icon">
                  <i class="fa fa-user"></i>
                </div>
              
                <input required type="search" id="search"  class="search-input" placeholder="Search by Emp No/ Name"  />
                <input  type="hidden" id="search_id" name="query" class="search-input" placeholder="Search by Emp No/ Name" />
                <button class="search-button" type="submit">
                <i class="fa fa-search"></i> 
                </button>
              </div>
            </form>
            
              <!-- Suggestions List -->
              <div class="suggestions-list" id="results" ></div>
              <div class="suggestions-list" id="suggestionsList">
                <!-- Suggestions will be dynamically populated -->
              </div>
            </div>
            <div class="employee-search-image">
              <img src="{{asset('admin/assets/img/emp-search.png')}}" alt="Search Illustration" />
            </div>
          </div>
         <!-- Display area for document info -->
        <div id="doc-info">
            
        </div>
        <div id="document-content"></div>
      
        
    <!-- Document form to add a new document (initially hidden) -->
    

    @include('admin.employee.document.editDoc')
    @include('admin.employee.document.addDoc')
    <!-- Message area for success/error messages -->
    <div class="mt-4 filter-bar">
        <button id="add-doc-button" class="add-documents-btn" style="display:none;">Add Document</button>
    </div>  
    <div id="message" class="mt-3 "></div>
    @include('admin.employee.document.viewDoc')
    
</div>
   
  @endsection
  @section('script')
  <script>
    // Handle document search
    $('#search-doc-info').on('submit', function(e) {
        e.preventDefault();
        
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('get.doc.info') }}", // Replace with your route
            method: "POST",
            data: formData,
            success: function(data) {
                $('#employee_id').val(data.empID);
                if (data.empDoc && data.empDoc.length > 0) {
                    let documentList = '';
                    data.empDoc.forEach(function(doc) {
                        documentList +=
                         `
                      <div class="document-card">
      <div class="document-icon">
        📄
      </div>
      <div class="document-content">
        <div class="document-title">
          ${doc.doc_name}
          <span class="document-status">${doc.isActive == 1 ? 'Published' : 'Inactive'}</span>
        </div>
        <div class="document-details">
          ${doc.formatted_date || 'N/A'}
          <br>
          <a href="#">${doc.file}</a>
          ${doc.file ? `<a href="/storage/${doc.file}" download="${doc.file}" class="btn "> <i class="fa fa-download" aria-hidden="true"></i> </a>` : ''}
          ${doc.file ? `<button class="btn view-button" data-image-url="/storage/${doc.file}"><i class="fa fa-eye" aria-hidden="true"></i></button>` : ''}
        </div>
      </div>
      <div class="document-actions">
        ${doc.id ? `<button class="btn edit-button" data-id="${doc.id}"><i class="fa fa-edit" aria-hidden="true"></i></button>` : ''}
        ${doc.id ? `<button class="btn delete-button" data-id="${doc.id}"><i class="fa fa-trash" aria-hidden="true"></i></button>` : ''}
      </div>
    </div> `;
                    });
                    $('#message').html(documentList); 
                    // $('#message').html(`<p>Document Found: ${data.empDoc.doc_name}</p>`);
                    $('#add-doc-button').show();      // Hide "Add Document" button
                    $('#add-doc-form').hide();        // Hide form if a document exists
                } else {
                    $('#message').html(`<p>No document found. You can add a new one.</p>`);
                    $('#add-doc-button').show();      // Show "Add Document" button
                    $('#add-doc-form').hide();        // Ensure the form is hidden initially
                }
            },
            error: function(xhr) {
                $('#message').html(`<p style="color:red;">${xhr.responseText}</p>`);
            }
        });
    });

    // Show add document form on button click
    $('#add-doc-button').on('click', function() {
        $(this).hide();  // Hide the "Add Document" button
        $('#add-doc-form').show();
          // Show the form
    });

    $('#cancel-file').on('click', function() {
        $('#file').val('');  // Clear the file input field
    });

    $('#cancel-form').on('click', function() {
        // Reset the form
        $('#add-doc-form')[0].reset();
        
        // Hide the form and show the "Add Document" button again
        $('#add-doc-form').hide();
        $('#add-doc-button').show();
        $('#search-doc-info').trigger('submit');
    });


    // edit
    $('#cancele-edit-form').on('click', function() {
        // Reset the form
        $('#edit-doc-form')[0].reset();
        $('#message').show();
        $('#edit-doc-form').hide();
        $('#search-doc-info').trigger('submit');
    });

    // Handle add document form submission
    $('#add-doc-form,#edit-doc-form').on('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('post.doc.info') }}", // Your route to handle document creation
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#message').html(`<p>${response.message}</p>`);
                $('#add-doc-form').hide();  // Hide the form after submission
                $('#edit-doc-form').hide();  // Hide the form after submission
                $('#add-doc-form')[0].reset();
                $('#edit-doc-form')[0].reset();
                $('#message').show();  
                $('#search-doc-info').trigger('submit');
            },
            error: function(xhr) {
                $('#message').html(`<p style="color:red;">${xhr.responseText}</p>`);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Trigger image view within the same tab
            $(document).on('click', '.view-button', function() {
            const imageUrl = $(this).data('image-url');
            // alert(imageUrl);
            const fileExtension = imageUrl.split('.').pop().toLowerCase();
            console.log(fileExtension);
            let viewerContent = '';
            if (['pdf'].includes(fileExtension)) {
        // Embed PDF
                    viewerContent = `<iframe src="${imageUrl}" frameborder="0" style="width: 100%; height: 100%;"></iframe>`;
                } else if (['jpeg', 'jpg', 'png', 'gif', 'bmp'].includes(fileExtension)) {
                    // Show images
                    viewerContent = `<img src="${imageUrl}" alt="Document Image" style="max-width: 100%; height: auto;">`;
                } else if (['doc', 'docx', 'txt'].includes(fileExtension)) {
                    // Use Google Docs viewer for Word documents or display text
                    viewerContent = `<iframe src="https://docs.google.com/viewer?url=${imageUrl}&embedded=true" 
                                    frameborder="0" style="width: 100%; height: 100%;"></iframe>`;
                } else {
                    // Unsupported file type message
                    viewerContent = `<p>Preview not available for this file type. <a href="${imageUrl}" target="_blank">Download File</a></p>`;
                }
            // $('#documentImage').attr('src', imageUrl);
            // $('#documentModal').show();
            $('#fileViewer').html(viewerContent);
            $('#fileModal').modal('show');
        });
    
        // Close the modal when close icon is clicked
            $(document).on('click', '#closeModal', function() {
            // alert('ok');
            $('#documentModal').hide();
        });
        
        // Close modal on clicking outside the image
        // $(window).on('click', function(event) {
        //     if (event.target === $('#documentModal')[0]) {
        //         $('#documentModal').hide();
        //     }
        // });
        $(document).on('click', '#download-button', function () {
        const docID = $(this).data('id');
        // alert(docID);
        $.ajax({
            url: '/admin/employee/downloadDocument/' + docID,
            method: 'GET',
            success: function (response) {
                
            },
            error: function () {
                alert('File not found or an error occurred.');
            }
        });
    });
    });
    </script>

<script>
    $(document).ready(function() {
        // Trigger image view within the same tab
            $(document).on('click', '.edit-button', function() {
            const docId = $(this).data('id');
            $('#edit-doc-form').show();
            $('#message').hide(); 
            // alert(docId);
            $.get("{{ url('admin/edit-doc-info') }}/" + docId, function (data) {
                $('#employeeID').val(data.document.employee_id);
                $('#doc_name').val(data.document.doc_name);
                $('#category').val(data.document.category);
                $('#description').val(data.document.description);
                // $('#isActive').val(data.document.isActive);
                $('#isActive').prop('checked', data.document.isActive == 1);
                // console.log(data.document);
                if (data.document.file) {
                        $('#fileName').text(data.document.file); // Show the file name
                        $('#deleteFile').show(); // Show the delete icon
                        $('#deleteFile').data('file', data.document.file); 
                    }
                
            });
        });

        $('#deleteFile').click(function() {
    const fileName = $(this).data('file'); // Get the file name to delete

    // if (confirm('Are you sure you want to delete this file?')) {
        $.ajax({
            url: "{{ route('delete.doc.file') }}", // Your route to handle file deletion
            type: 'POST',
            data: {
                file: fileName,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    // alert('File deleted successfully!');
                    $('#fileName').text(''); // Clear the file name
                    $('#deleteFile').hide(); // Hide the delete icon
                } else {
                    alert('Error deleting file.');
                }
            },
            error: function(xhr, status, error) {
                // alert('An error occurred while deleting the file.');
                $('#message').html(`<p style="color:red;">${xhr.responseText}</p>`);
            }
        });
    // }
});


    
    });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.delete-button', function() {
        const docID = $(this).data('id');
        // alert(employeeId);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/delete-doc-info/' + docID,
                    method: 'DELETE',
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.success,
                            'success'
                        ).then(() => {
                            // Redirect after a successful deletion
                            $('#search-doc-info').trigger('submit');
                        });
                        // window.location.href = '/admin/employees';
                        // Remove the employee row from the table
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An unexpected error occurred.',
                        });
                    }
                });
            }
        });

        
        
    });
    
    </script>
  @endsection