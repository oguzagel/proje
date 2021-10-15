<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 



//Route::view('/','home.index')->name('home.index');
//Route::view('/contact','home.contact')->name('home.contact');

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');


Route::resource('posts',PostsController::class)->only(['index','show','create','store','edit','update','destroy']);



$posts = [
    1 => ['title' => 'Ders 1' , 'content' => 'Laravel Kurulum', 'is_new'=> true , 'has_comments' => false ],
    2 => ['title' => 'Ders 2' , 'content' => 'Laravel Routing', 'is_new'=> false ],
];


Route::prefix('/test')->name('test.')->group(function() use($posts){
        
    Route::get('responses',function() use($posts){
        return response($posts,201)
        ->header('Content-Type','application/json')
        ->cookie('TEST_COOKIE','oğuz demir',3600);
    })->name('responses');

    Route::get('redirect',function() {
        return redirect('/contact');
    })->name('redirect');


    Route::get('back',function() {
        return back();
    })->name('back');


    Route::get('adresegit',function() {
        return redirect()->route('posts.show',['id'=>1]);
    })->name('adresegit');


    Route::get('away',function() {
        return redirect()->away('http://google.com');
    })->name('away');

    Route::get('json',function() use($posts) {
        return response()->json($posts);
    })->name('json');


    Route::get('download',function() {
        return response()->download('images/laravel.png','test_image.png');
    })->name('download');
});

/* 
Route::get('test/responses',function() use($posts){
    return response($posts,201)
    ->header('Content-Type','application/json')
    ->cookie('TEST_COOKIE','oğuz demir',3600);
});

Route::get('test/redirect',function() {
    return redirect('/contact');
});


Route::get('test/back',function() {
    return back();
});


Route::get('test/adresegit',function() {
    return redirect()->route('posts.show',['id'=>1]);
});


Route::get('test/away',function() {
    return redirect()->away('http://google.com');
});

Route::get('test/json',function() use($posts) {
    return response()->json($posts);
});


Route::get('test/download',function() {
    return response()->download('images/laravel.png','test_image.png');
}); */





















Route::get('/images/{id?}', function($id = 15){
    return 'Images '.$id .'. Page!';
})->name('home.images');










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
