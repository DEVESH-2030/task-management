@extends('task.layout.app')

@section('content')
    <h2> Create Task</h2>

    @include('task.layout.response-message')

    <form method="POST" action="{{ route('createTask') }}">
        @csrf <!-- Add CSRF token if you are using Laravel for form submission -->

        @if ($errors->has('error'))
            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
        @endif

        {{-- task name input field --}}
        <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name" required>
            <span class="text-danger" id="name-error"></span>
        </div>

        {{-- task priority input field --}}
        <div class="mb-3 mt-3">
            <label for="priority">Priority:</label>
            <input type="text" class="form-control" id="priority" placeholder="Enter priority" name="priority" required>
            <span class="text-danger" id="priority-error"></span>
        </div>

        {{-- task order input field TODO: will use if needed to set order of the task as manually --}}
        {{-- <div class="mb-3 mt-3">
            <label for="order">Order:</label>
            <input type="text" class="form-control" id="order" placeholder="Enter order" name="order" required>
            <span class="text-danger" id="order-error"></span>
        </div> --}}

        {{-- task project select from dropdown --}}
        <div class="mb-3 mt-3">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control" required>
                <option value="">__Select project__</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <span class="text-danger" id="project-error"></span>
        </div>

    </form>

    <!-- Modal footer -->
    <div class="modal-footer">
        <a href="{{ route('/home') }}"> <button type="button" class="btn btn-danger"
                data-bs-dismiss="modal">Cancel</button></a> &nbsp;
        <button type="submit" class="btn btn-success" onclick="document.forms[0].submit();">Save</button>
    </div>
@endsection
