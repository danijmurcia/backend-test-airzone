<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Return data and relations
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $users = Post::with(['comments', 'owner', 'writers'])->get();
        } catch (\Throwable $e) {
            return sendError($e->getMessage());
        }

        return sendResponse($users, 'Posts listados correctamente');
    }

    /**
     * Return data from request and relations
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        try {
            $users = Post::with(['comments', 'owner', 'writers'])->findOrFail($request->id);
        } catch (\Throwable $e) {
            return sendError($e->getMessage());
        }

        return sendResponse($users, 'Post listado correctamente');
    }

}
