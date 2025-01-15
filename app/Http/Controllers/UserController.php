<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $usuario = User::find(1);
        $usuario2 = User::find(2);
        return View('index', compact('usuario', 'usuario2'));

    }
}
