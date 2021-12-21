@extends('layouts.main')

@section('title', 'All Posts')

@section('main-content')
    <div class="col-md-8 offset-2 mt-5">
        <h1>Posts' List <a class="btn btn-info pull-right" href="{{ route('posts.create') }}">Create New</a></h1>
        @foreach($posts as $post)
        <h3 class='mt-5'>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }} </a>
            @if($post->published == 0)
            <form style="margin: 0 15px;" class="pull-right" action="{{ route('posts.publish', $post->id) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="patch" />
                <input type="hidden" name="published" value=1 />
                <button class="btn btn-success btn-sm" type="submit">Publish</button>
            </form>
            @elseif($post->published == 1)
            <form style="margin: 0 15px;" class="pull-right" action="{{ route('posts.publish', $post->id) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="patch" />
                <input type="hidden" name="published" value=0 />
                <button class="btn btn-danger btn-sm" type="submit">Unpublish</button>
            </form>
            @endif
            <a style="margin-left: 90px;" class="btn btn-warning btn-sm mt-3" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            <form class="pull-right" action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="delete" />
                <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
            </form>
        </h3>
        <p>
            {{ $post->post_content }}
        </p>
        <p>
            Date Posted: {{ $post->created_at }}
        </p>
        @endforeach
    </div>

@stop