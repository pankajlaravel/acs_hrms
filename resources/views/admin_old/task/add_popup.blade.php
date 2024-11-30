<div class="modal custom-modal fade" id="add_task" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Task</h5>
           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="taskForm">
               @csrf
               <div class="mb-3">
                   <label for="name" class="form-label">Name:</label>
                   <input type="text" class="form-control" id="name" name="name" required>
               </div>
   
               <div class="mb-3">
                   <label for="description" class="form-label">Description:</label>
                   <textarea class="form-control" id="description" name="description" rows="3"></textarea>
               </div>
   
               <div class="mb-3">
                   <label for="checklist" class="form-label">Checklist:</label>
                   <input type="text" class="form-control" id="checklist" name="checklist">
               </div>
   
               <div class="mb-3">
                   <label for="tag" class="form-label">Tag:</label>
                   <input type="text" class="form-control" id="tag" name="tag">
               </div>
   
               <div class="mb-3">
                   <label for="followers" class="form-label">Followers:</label>
                   <input type="text" class="form-control" id="followers" name="followers">
               </div>
   
               <div class="mb-3">
                   <label for="assignee" class="form-label">Assignee (User ID):</label>
                   <select class="form-select"  name="assignee" required>
                     <option value="">Select Employee</option>
                     @foreach ($employee as $val)
                     <option value="{{$val->id}}">{{$val->firstName}}</option>
                     @endforeach
                 </select>
               </div>
   
               <div class="mb-3">
                   <label for="status" class="form-label">Status:</label>
                   <select class="form-select" id="status" name="status" required>
                       <option value="pending">Pending</option>
                       <option value="in-progress">In-Progress</option>
                       <option value="completed">Completed</option>
                   </select>
               </div>
   
               <div class="mb-3">
                   <label for="priority" class="form-label">Priority:</label>
                   <select class="form-select" id="priority" name="priority" required>
                       <option value="low">Low</option>
                       <option value="medium">Medium</option>
                       <option value="high">High</option>
                   </select>
               </div>
   
               <div class="mb-3">
                   <label for="start_date" class="form-label">Start Date:</label>
                   <input type="date" class="form-control" id="start_date" name="start_date" required>
               </div>
   
               <div class="mb-3">
                   <label for="due_date" class="form-label">Due Date:</label>
                   <input type="date" class="form-control" id="due_date" name="due_date" required>
               </div>
   
               <button type="submit" class="btn btn-primary">Save Task</button>
           </form>
         </div>
      </div>
   </div>
</div>