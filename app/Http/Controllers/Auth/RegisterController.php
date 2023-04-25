<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $input = $request->all();

        User::create([
            ...$input,
            'password' => Hash::make($request->input('password')),
            'role' => 'user'
        ]);

        return response()->json();
    }
}
