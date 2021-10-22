@extends('layouts.app')

@section('title', 'Posts' )


@section('content')

    
@foreach ($posts as $post)
    <div class="mb-3">
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['content'] }}</p>
        <p> Toplam {{ $post->comments_count }} yorum var </p>
        <p class="text-muted"> {{ $post->user->name }}  tarafından  {{ $post->created_at->diffForHumans() }} eklendi. </p>
        
        @can('update', $post)
            <a class="btn btn-primary" href="{{ route('posts.edit',['post' => $post['id'] ]) }}">Düzenle</a>
        @endcan

        
        @can('delete', $post)
            <form action="{{ route('posts.destroy',['post' => $post['id'] ]) }}" method="POST" class="form-check-inline" >
                @csrf
                @method('DELETE')
                <input type="submit" value="Sil" class="btn btn-primary">
            </form>
        @endcan


       
        
        <hr>
        
    </div>    
@endforeach


@endsection
