<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#projectModal"> Create Project </button>

<!-- The Modal -->
<div class="modal" id="projectModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create Project</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                {{-- @include('task.layout.response-message') --}}
                <form  method="POST" action="{{ route('storeProject') }}">
                    <div class="mb-3 mt-3">
                        <label for="name">Name:</label>
                        <input type="name" class="form-control" id="name" placeholder="Enter task name"
                            name="title" required>
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
