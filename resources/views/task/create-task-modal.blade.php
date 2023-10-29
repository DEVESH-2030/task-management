<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#taskModal">Create Task</button>

<!-- The Modal -->
<div class="modal" id="taskModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Task</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                {{-- @include('task.layout.response-message') --}}
                <form method="POST" action="{{ route('createTask') }}">
                    @csrf <!-- Add CSRF token if you are using Laravel for form submission -->

                    @if ($errors->has('error'))
                        <div class="alert alert-danger">{{ $errors->first('error') }}</div>
                    @endif

                    <div class="mb-3 mt-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name" required>
                        <span class="text-danger" id="name-error"></span>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="priority">Priority:</label>
                        <input type="text" class="form-control" id="priority" placeholder="Enter priority" name="priority" required>
                        <span class="text-danger" id="priority-error"></span>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="project_id">Project:</label>
                        <select name="project_id" id="project_id" class="form-control" required>
                            <option value="">Select project</option>
                            <option value="1">Task Management</option>
                            <option value="2">Project Management</option>
                            <option value="3">Test</option>
                            <option value="4">Dropping</option>
                        </select>
                        <span class="text-danger" id="project-error"></span>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" onclick="document.forms[0].submit();">Save</button>
            </div>

        </div>
    </div>
</div>
