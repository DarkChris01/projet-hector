<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationAssociationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => ["required", "string", "email"],
            "password" => ["required","string"]
        ]);
        $association = Association::where("email", $request->email)->first();
        if (Hash::check($request->password, $association->password)) {
            return view("associations/show", ["association" => $association]);
        }
        return back()->with("error","probleme lors de la connexion");
    }
}
