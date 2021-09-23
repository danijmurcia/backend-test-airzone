<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $users = Post::with(['comments', 'owner', 'writers'])->get();
        return sendResponse($users, 'Posts listados correctamente');
    }
}
