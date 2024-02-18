<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $users = User::all();
        $latestposts = Post::latest()->limit(5)->get();
        return view('admin.dashboard',compact('users','latestposts'));
    }
}
