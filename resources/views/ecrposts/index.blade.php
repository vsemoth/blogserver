<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Post
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
        <h1>Posts' List <a class="btn btn-info pull-right" href="{{ route('ecrposts.create') }}">Create New</a></h1>
        @foreach($posts as $post)
        <div class='col-md-8 mt-5 pills'>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('ecrposts.show', $post->id) }}">{{ $post->post_title }} </a>
                </li>

                <li class="list-group-item">
                    <a class="btn btn-warning btn-sm mt-3" href="{{ route('ecrposts.edit',$post->id) }}">Edit</a>
                </li>

                <li class="list-group-item">
                    @if($post->published == 0)
                    <form class="pull-right" action="{{ route('ecrposts.publish', $post->id) }}" method="post">
                    @csrf
                        <input type="hidden" name="_method" value="patch" />
                        <input type="hidden" name="published" value=1 />
                        <button class="btn btn-success btn-sm" type="submit">Publish</button>
                    </form>
                    @elseif($post->published == 1)
                    <form class="pull-right" action="{{ route('ecrposts.publish', $post->id) }}" method="post">
                    @csrf
                        <input type="hidden" name="_method" value="patch" />
                        <input type="hidden" name="published" value=0 />
                        <button class="btn btn-danger btn-sm" type="submit">Unpublish</button>
                    </form>
                    @endif
                </li>
                <li class="list-group-item">
                    <form class="pull-right" action="{{ route('ecrposts.destroy', $post->id) }}" method="post">
                    @csrf
                        <input type="hidden" name="_method" value="delete" />
                        <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                    </form>
                </li>
            </ul>
        </div>
        <p>
            {{ $post->post_content }}
        </p>
        <p>
            Date Posted: {{ $post->created_at }}
        </p>
        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>