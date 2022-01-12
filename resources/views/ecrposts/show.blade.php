@extends('layouts.main')

@section('title', 'All Posts')

@section('main-content')
    <div class="col-md-8 offset-2 mt-5">
        <p><a class="btn btn-link pull-right" href="{{ route('ecrposts.index') }}">Posts' List</a></p>
        <h1 class='mt-5'>{{ $post->post_title }}</h1>
        <!-- <img src="/storage/images/image_urls/{{ $post->image_url }}" alt="{{ $post->image_url }}" /> -->
        <p style="width: 100%;">
            {!! $post->post_content !!}
        </p>
        <p>
            Date Posted: {{ $post->created_at }}
        </p>
    </div>

@stop