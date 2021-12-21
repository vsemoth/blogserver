@extends('layouts.main')

@section('title', 'Create New Post')

@section('main-content')
    <div class="col-md-8 offset-2 mt-5">
        <h2>Create a New Post</h2>
    <form action="{{ route('posts.store') }}" method='post' class='mt-3'>
        <x-forms.tinymce-editor/>
    </form>
    </div>
@stop