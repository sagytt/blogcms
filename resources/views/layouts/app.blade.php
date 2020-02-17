<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
     <script>

        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif

        @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
        @endif

    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @notifyCss
    @yield('styles')
</head>
<body>
    <div id="app">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::has('info'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('info')}}
                </div>
            @endif

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if(Auth::check()){{--        check if user if logged in or not        --}}
                <div class="col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('dashboard')}}">Home</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('tags')}}">Tags</a>

                        </li> <li class="list-group-item">
                            <a href="{{route('tag.create')}}">Create New Tag</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('categories')}}">Categories</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create new category</a>
                        </li>

                        <li class="list-group-item" >
                            <a href="{{route('post.create')}}">Create new post</a>

                        </li> <li class="list-group-item" >
                            <a href="{{route('posts')}}">All Posts</a>
                        </li>

                        <li class="list-group-item" >
                            <a href="{{route('posts.trashed')}}">All Trashed Posts</a>

                        @if(Auth::user()->admin)
                        </li><li class="list-group-item" >
                            <a href="{{route('users')}}">All Users</a>
                        </li>
                        <li class="list-group-item" >
                            <a href="{{route('user.create')}}">Add New User</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('user.profile')}}">My Profile</a>
                        </li>
                        @endif

                        @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('settings') }}">Settings</a>
                            </li>
                        @endif
                    </ul>
                </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
        <main class="py-4">
        </main>
    </div>
@yield('scripts')
</body>
</html>
