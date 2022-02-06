@extends('layouts.app')
@section('content')
    <script>
        window.User = {
            id: '{{ optional(auth()->user())->id }}',
            name: '{{ optional(auth()->user())->name }}',
        }
    </script>
    <div id="app">
    </div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
@endsection