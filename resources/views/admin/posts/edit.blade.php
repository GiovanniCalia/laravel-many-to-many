@extends('layouts.admin')

@section('pageTitle', 'Edit post')

@section('content')
<main>
    <div class="container">
      <div class="row">
          <div class="col-8 offset-2">
              <h1 class="text-center">Add a post</h1>
              <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" class="mb-3">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="title" class="form-label"><h4>{{ __('title') }}</h4></label>
                    <input type="text" name="title" class="form-control" id="text" value="{{ old('title', $post->title) }}">
                  </div>
                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="slug" class="form-label"><h4>{{ __('slug') }}</h4></label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $post->slug) }}">
                  </div>
                  @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <select name="category_id" id="category">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="creator" class="form-label"><h4>{{ __('creator') }}</h4></label>
                    <input type="text" name="creator" class="form-control" id="creator" value="{{ old('creator', $post->creator) }}">
                  </div>
                  @error('creator')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="description" class="form-label"><h4>{{ __('description') }}</h4></label>
                    <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $post->description) }}">
                  </div>
                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="image" class="form-label"><h4>{{ __('image') }}</h4></label>
                    <input type="text" name="image" class="form-control" id="image" value="{{ old('image', $post->image) }}">
                  </div>
                  @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-3">
                    <label for="date_creation" class="form-label"><h4>{{ __('date_creation') }}</h4></label>
                    <input type="date" name="date_creation" class="form-control" id="date_creation" value="{{ old('date_creation', $post->date_creation) }}">
                  </div>
                  @error('date_creation')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <div class="text-center links my-4">
                <a class="btn btn-primary" href="{{ url()->previous()}}" id="gray">Back</a>
                <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Return to posts list</a>
                <a class="btn btn-primary" href="{{ route('admin.posts.indexUser') }}">Return to my posts list</a>
                <a class="btn btn-primary" href="{{ route('admin.home') }}" id="red">Return to home</a>
              </div>
          </div>
      </div>
  </div>
  </main>
@endsection