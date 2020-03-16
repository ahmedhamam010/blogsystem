<?php

namespace App\Http\Controllers;

use App\Link;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index' , ['posts' => Post::all() , 'links' => Link::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id  = request()->user()->id;
        // $path =request()->image->getClientOriginalName();
        // request()->image->move(public_path('uplaod'), $path );
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $post->image = $imageName;
       
        $post->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view( 'posts/show' , ['posts' => Post::find($id) ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view( 'posts.edit' , ['postId' => $id  , 'idDetails' =>  Post::find($id) ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = $post->user->id;
        if( $request->hasFile('image')){ 
            $image = $request->file('image'); 
            $fileName = time()."_". $image->getClientOriginalName();
            request()->image->move(public_path('images'), $fileName);
            $post->image = $fileName;
            
        } else {
            $post->image = $post->image;
    }
        
        $post->save();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts');
    }
}
