<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return sendResponse($users, 'Usuarios listados correctamente');
    }
}
