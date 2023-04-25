<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (! auth()->attempt($request->all())) {
            return response()->json(['message' => 'fail'], 401);
        }

        return response()->json();
    }
}
