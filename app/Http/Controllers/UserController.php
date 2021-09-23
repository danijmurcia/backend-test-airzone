<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('post')->get();
        return sendResponse($users, 'Usuarios listados correctamente');
    }
}
