<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
    */
    public function index(): \Illuminate\View\View
    {
        // Retrieve all users from the database
        $users = \App\Models\User::all();
        
        // Retrieve all posts from the database
        $latestposts = Post::latest()->limit(5)->get();
        
        // Return the view with the users and posts data
        return view('admin.users.index', compact('users', 'latestposts'));
    }
}
