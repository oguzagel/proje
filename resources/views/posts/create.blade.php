@extends('layouts.app')

@section('title','Yeni Kayıt Oluştur')
    



@section('content')
   
    
    <form action="{{ route('posts.store') }}" method="POST">
    @csrf    
        @include('posts.partials.form')
        <input class="btn btn-success" type="submit" value="Kaydet">
        
        @if ($errors->any())
            <div>
                <ul class="list-group list-group-flush">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


       


   </form>
@endsection

