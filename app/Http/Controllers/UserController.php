<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $register_user = new User;
        $register_user->name = $request->name;
        $register_user->username = $request->username;
        $register_user->email = $request->email;
        $register_user->password = $request->password;
        $register_user->address = $request->address;
        $register_user->role = "user";
        return response([
            'status' => true,
            'message' => 'User registered',
            'data' => $register_user
        ],200);
    }

    public function checkRole($email) {
        $user = User::where('email', $email)->get();
        return response([
            'status' => true,
            'message' => 'Otorisasi berhasil',
            'data' => $user->role
        ], 200);
    }

    public function checkUsername($email) {
        $user = User::where('email', $email)->get();
        return response([
            'status' => true,
            'message' => 'Otorisasi berhasil',
            'data' => $user->username
        ], 200);
    }

    public function readUser($email) {
        $user = User::where('email', $email)->get();
        return response([
            'status' => true,
            'message' => 'Otorisasi berhasil',
            'data' => $user
        ], 200);
    }
}
