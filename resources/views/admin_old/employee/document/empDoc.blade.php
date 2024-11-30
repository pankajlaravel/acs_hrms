
@extends('admin.layouts.app')

@section('title', 'Dashboard - HRMS Admin')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          
   
        
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">

          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#basic_info">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Add Employee
              </a>
              
            </div>
          </div>

          {{-- Search --}}
          <div class="col-12">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h3 class="card-title">Start searching to see specific employee details here</h3>
                    <div class="row row-cards">
                      <div class="col-md-5">
                        <form id="search-doc-info" method="post" >
                          @csrf
                        <div class="mb-3">
                          <p>Search Employee</p>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0px 0px 50px">
                              <i class="fa fa-user" ></i> <!-- Bootstrap user icon -->
                            </span>
                          
                            <input required type="search" id="search"  class="form-control custom-radius" placeholder="Search by Emp No/ Name"  />
                            <input  type="hidden" id="search_id" name="query" class="form-control custom-radius" placeholder="Search by Emp No/ Name" />
                       
                            {{-- <div id="suggestions" class="suggestions" style="position: absolute; z-index: 1000; display: none; background: white; border: 1px solid #ddd;"></div> --}}
                            <button class="btn btn-primary" type="submit" style="border-radius: 0px 50px 50px 0px">
                              <i class="fa fa-search"></i> <!-- Bootstrap search icon -->
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <ul class="list-group" style="display:block;position:relative;z-index:1" id="results" ></ul>
              </div>
            </div>
          </div>
        </div>
         <!-- Display area for document info -->
        <div id="doc-info">
            
        </div>
        <div id="document-content"></div>
        </div>
        
        <button id="add-doc-button" class="mb-4 btn btn-success" style="display:none;">Add Document</button>
    <!-- Document form to add a new document (initially hidden) -->
    

    @include('admin.employee.document.editDoc')
    @include('admin.employee.document.addDoc')
    <!-- Message area for success/error messages -->
    <div id="message" class="mt-3"></div>
      </div>
    </div>
    @include('admin.employee.document.viewDoc')
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
                        <div class="col-md-4">
                                    <div class="mb-3 card">
                                        <div class="card-header">
                                            <h5 class="card-title">${doc.doc_name}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Date:</strong> ${doc.formatted_date || 'N/A'}</p>
                                            <p><strong>Description:</strong> ${doc.description || 'N/A'}</p>
                                            <p><strong>Category:</strong> ${doc.category || 'N/A'}</p>
                                            <p><strong>Status:</strong> ${doc.isActive == 1 ? 'Active' : 'Inactive'}</p>
                                            ${doc.file ? `<button class="btn btn-warning view-button" data-image-url="/storage/${doc.file}"><i class="fa fa-eye" aria-hidden="true"></i></button>` : ''}
                                            ${doc.id ? `<button class="btn btn-success edit-button" data-id="${doc.id}"><i class="fa fa-edit" aria-hidden="true"></i></button>` : ''}
                                            ${doc.id ? `<button class="btn btn-danger delete-button" data-id="${doc.id}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>` : ''}
                                            ${doc.file ? `<a href="/storage/${doc.file}" download="${doc.file}" class="btn btn-primary"> <i class="fa fa-download" aria-hidden="true"></i> </a>` : ''}
                                            
                                        </div>
                                    </div>
                                </div>
                        `;
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
                console.log(data.document);
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