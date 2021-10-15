@extends('layouts.app')
@section('title','Yeni Kayıt Oluştur')
    

@section('content')
   
    
<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
    @csrf   
    @method('PUT') 
        @include('posts.partials.form')
        <input type="submit" value="Güncelle">
        
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
 
   </form>
@endsection

