<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $users = Post::all();
        return sendResponse($users, 'Posts listados correctamente');
    }
}
