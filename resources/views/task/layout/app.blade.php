<!DOCTYPE html>
<html lang="en">

@include('task.layout.header')

<body>
    <div class="container mt-3">

        {{-- @yield('response-message') --}}
        @yield('content')

        {{-- @include('task.layout.response-message') --}}

    </div>

    @include('task.layout.app-js')

</body>

</html>
