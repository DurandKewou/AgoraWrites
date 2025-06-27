<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function welcome()
    {
        
        $posts = Post::all();
        return view('welcome', compact('posts')); // Correspond à resources/views/welcome.blade.php
    }
}
