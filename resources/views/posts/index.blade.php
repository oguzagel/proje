@extends('layouts.app')

@section('title', 'Posts' )


@section('content')

    
@foreach ($posts as $post)
    <div class="mb-3">
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['content'] }}</p>
        <form action="{{ route('posts.destroy',['post' => $post['id'] ]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Sil" class="btn btn-primary">
        </form>
        <hr>
        
    </div>    
@endforeach


@endsection
