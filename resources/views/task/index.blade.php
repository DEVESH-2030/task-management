@extends('task.layout.app')

@section('content')
    <h2>Task Management System</h2>

    @include('task.layout.response-message')

    {{-- buttons --}}
    <div class="process-button">
        <a href="{{ route('create-task') }}"> <button type="button" class="btn btn-success">Create Task</button> </a>
        <a href="{{ route('create-project') }}"> <button type="button" class="btn btn-success">Create Project</button> </a>
    </div>

    {{-- task records list --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th> # </th>
                <th> Task Name </th>
                <th> Priority </th>
                <th> Project Name </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody id="sortable">
            @forelse ($tasks as $task)
                <tr data-id="{{ $task->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->name ?? '' }}</td>
                    <td>{{ $task->priority ?? '' }}</td>
                    <td>{{ $task->project->name ?? '' }}</td>
                    <td>
                        {{-- @include('task.edit-task') --}}
                        <a href="{{ route('edit-task', $task) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="{{ route('delete', $task) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <span class="form-control" align="center">
                            No Data Available
                        </span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $tasks->links() }}
@endsection
