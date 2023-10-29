@extends('task.layout.app')

@section('content')
    <h2> Create Project</h2>

    @include('task.layout.response-message')

    {{-- <div class="container mt-4"> --}}
        <div class="amin">

        </div>
        <form method="POST" action="{{ route('storeProject') }}">
            @csrf <!-- Add CSRF token if you are using Laravel for form submission -->

            @if ($errors->has('error'))
                <div class="alert alert-danger">{{ $errors->first('error') }}</div>
            @endif

            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name" required>
                <span class="text-danger" id="name-error"></span>
            </div>
        </form>

        <!-- Modal footer -->
        <div class="modal-footer">
            <a href="{{ route('/home') }}"> <button type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">Cancel</button></a> &nbsp;
            <button type="submit" class="btn btn-success" onclick="document.forms[0].submit();">Save</button>
        </div>
    {{-- </div> --}}
@endsection
