<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $users = Category::all();
        return sendResponse($users, 'Categorías listados correctamente');
    }
}
