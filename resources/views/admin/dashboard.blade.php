@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class ="row pt-3">
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    Posted
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                       {{ $posts_count }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    Trashed Posts
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                        {{ $trashed_count }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    USERS
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                        {{ $users_count }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    Categories
                </div>
                <div class="panel-body">
                    <h1 class="text-center">
                        {{ $categories_count }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
