@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-between align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div>
                        <a class="btn btn-primary" href="{{ route('admin.posts.indexUser') }}">Go to my posts</a>
                        <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Go to posts list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
