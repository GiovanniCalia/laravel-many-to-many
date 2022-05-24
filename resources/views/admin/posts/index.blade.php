@extends('layouts.admin')

@section('pageTitle', 'Index home')

@section('content')
<main class="background_post" >
    <h1>Boolpress</h1>
    <div class="text-center links mt-5">
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Create a new post</a>
        <a class="btn btn-primary" href="{{ route('admin.home') }}">Return to home</a>
    </div>
    <ol class="d-flex flex-wrap justify-content-around cards_main">
        @foreach ($posts as $post)
            <li class="text-center" data-id="{{ $post->id }}">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
                <h3><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                <div>Created by: <strong>{{ $post->creator }}</strong></div>
                @if (Auth::user()->id === $post->user_id)
                   <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                @endif
                @if (Auth::user()->id === $post->user_id)
                   <button class="btn btn-danger btn-delete">Delete</button>
                @endif
            </li> 
         @endforeach
     </ol>
     
    {{ $posts->links() }}

    <section id="confirmation-overlay" class="overlay d-none">
        <div class="popup">
            <h1>Sei sicuro di voler eliminare?</h1>
            <div class="d-flex justify-content-center">
                <button id="btn-no" class="btn btn-primary me-3">NO</button>
                <form method="POST" data-base="{{ route('admin.posts.destroy', '*****') }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">SI</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection