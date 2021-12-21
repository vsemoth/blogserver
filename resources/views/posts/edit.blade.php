@extends('layouts.main')

@section('title', 'Create New Post')

@section('main-content')
    <div class="col-md-8 offset-2 mt-5">
        <h2>Post Edit</h2>
    <form action="{{ route('posts.update', $post->id) }}" method='post' class='mt-3'>
    @csrf
        <input type="hidden" name="_method" value="patch" />
        <input class='form-control mt-3' type='text' name='post_title' placeholder='Post Title' value="{{ $post->post_title }}" required>
        <textarea id="file-picker" rows=15 class='form-control mt-3' type='text' name='post_content' placeholder='Type here...'>{{ $post->post_content }}</textarea>
        <button type='submit' class='btn btn-success btn-block mt-3'>Update Post</button>
    </form>
    </div>
@stop