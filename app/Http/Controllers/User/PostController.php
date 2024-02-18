<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(){
        // Retrieve all posts from the database
        $posts = Post::all();
        
        $latestposts = Post::latest()->limit(5)->get();
        // Return the view with the posts data
        return view('posts.index',compact('posts','latestposts'));
    }

    public function create(){
        
        $latestposts = Post::latest()->limit(5)->get();
        return view('posts.create',compact('latestposts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
    */
    public function store(StorePostRequest $request)
    {
        $user = Auth::user();

        $post = Post::firstOrCreate([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'user_id' => $user->id,
        ]);

        if ($request->hasFile('avatar')) {
            $post->addMedia($request->file('avatar'))->toMediaCollection('posts');
        }
        
        return redirect()->back()->with('success', 'Post created successfully');
    }

    /**
     * Show the posts for a given user.
    */
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        $posts = Post::find($id);
        $latestposts = Post::latest()->limit(5)->get();
        return view('posts.edit', compact('posts','latestposts'));
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(StorePostRequest $request, Post $post)
    {
        $user = Auth::user();
        $post->updateOrCreate([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'user_id' => $user->id,
            
        ]);

        if ($request->hasFile('avatar')) {
            $post->addMedia($request->file('avatar'))->toMediaCollection('posts');
        }

        return redirect()
        ->back()
        ->with('success', 'Update updated successfully');

    }

    public function destroy($id){
        
        $post = Post::find($id); // Retrieve the soft deleted post
        if ($post) {
            $post->clearMediaCollection('avatar'); // Delete associated media
            $post->forceDelete(); // Permanently delete the post
        }
        return redirect()->back();
    }
}
