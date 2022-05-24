@extends('layouts.admin')

@section('pageTitle', $post->title)

@section('content')
<main class="main_box">
    <div class="text-center my-4 box">
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
        <h1>{{ $post->title }}</h1>
        <div>Created by: <strong>{{ $post->user->name }}</strong></div>
        <div>Category: {{ $post->category->name }}</div>
        <div>Phone number: {{ $post->user->userInfo->phone_number }}</div>
        <p>{{ $post->description }}</p>
        <div>Creation date: <strong>{{ $post->date_creation }}</strong></div>
        <div class="links mt-2">
            <a class="btn btn-primary" href="{{ url()->previous()}}" id="gray">Back</a>
            @if (Auth::user()->id === $post->user_id)
                <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
            @endif
            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Return to posts list</a>
            <a class="btn btn-primary" href="{{ route('admin.posts.indexUser') }}">Return to my posts list</a>
        </div>
        @if (Auth::user()->id === $post->user_id)
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-3" onClick="return confirm('Are you sure to delete this comic?')">Delete</button>
            </form>
        @endif
    </div>
</main>
@endsection