<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    private $posts = [
        1 => ['title' => 'Ders 1' , 'content' => 'Laravel Kurulum', 'is_new'=> true , 'has_comments' => false ],
        2 => ['title' => 'Ders 2' , 'content' => 'Laravel Routing', 'is_new'=> false ],
    ];

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',[ 'posts' => BlogPost::all() ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        

        $post = new BlogPost();
        $post->title = $validated['title']; 
        $post->content = $validated['content']; 
        $post->save();

        $request->session()->flash('status','İcerik başarıyla kayıt edilmiştir');
        
        return redirect()->route('posts.show',['post' =>  $post->id ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',[ 'post' => BlogPost::find($id) ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit',['post' => BlogPost::findOrFail($id)]);

        //return view('posts.edit',['post' => BlogPost::findOrFail($id) ]);
        //return view('posts.show',[ 'post' => BlogPost::find($id) ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        /*
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        */
        $post->fill($validated);
        $post->save();


        $request->session()->flash('status','Güncelleme yapıldı.');
        return redirect()->route('posts.show',['post' => $post->id]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        request()->session()->flash('status', $id.' numaralı kaydınız Başarıyla silinmiştir.');
        return redirect()->route('posts.index');
        
    }
}
