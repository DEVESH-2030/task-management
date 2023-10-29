@extends('task.layout.app')

@section('content')
    <h2> Edit Task</h2>

    @include('task.layout.response-message')
    {{-- @dd($task->id) --}}
    <form method="POST" action="{{ route('update-task', $task) }}">
        @csrf <!-- Add CSRF token if you are using Laravel for form submission -->

        @if ($errors->has('error'))
            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
        @endif

        <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name" value="{{ $task->name ?? ''}}" required>
            <span class="text-danger" id="name-error"></span>
        </div>

        <div class="mb-3 mt-3">
            <label for="priority">Priority:</label>
            <input type="text" class="form-control" id="priority" placeholder="Enter priority" name="priority" value="{{ $task->priority ?? ''}}" required>
            <span class="text-danger" id="priority-error"></span>
        </div>

        {{-- get project in dropdown --}}
        <div class="mb-3 mt-3">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control" required>
                <option value="">__Select project__</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project->id === $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
            <span class="text-danger" id="project-error"></span>
        </div>

    </form>

    <!-- Modal footer -->
    <div class="modal-footer">
        <a href="{{ route('/home') }}"> <button type="button" class="btn btn-danger"
                data-bs-dismiss="modal">Cancel</button></a> &nbsp;
        <button type="submit" class="btn btn-success" onclick="document.forms[0].submit();">Update</button>
    </div>
@endsection
