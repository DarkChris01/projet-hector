<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationAssociationController extends Controller
{


    // Méthode pour se connecter et obtenir un token
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $association = Association::where('email', $request->email)->first();

        if (!$association || !Hash::check($request->password, $association->password)) {
            return response()->json(['message' => 'Credentials do not match'], 401);
        }

        // Générer un token d'accès
        $token = $association->createToken('token')->plainTextToken;

        return response()->json([

            'association' => $association,
            'access_token' => $token
        ]);
    }
}
