<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AssociationController extends Controller
{
    public function index()
    {
        $associations = Association::all();
        return view("associations.index", ["associations" => $associations]);
    }

    public function create()
    {
        return view("associations.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "unique:associations,email,Unavailable email"],
            "password" => ["required"]
        ]);

        $association = Association::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        if ($association) {
            return to_route("association.show", ["association" => $association->id], 201);
        }
    }

    public function approved(Association $association)
    {
        $association->update(["state" => 1]);
        return back()->with("success", "association approuvée");
    }


    public function rejected(Association $association)
    {
        $association->update(["state" => 2]);
        return back()->with("error", "association rejété");
    }

    public function login()
    {
        return view("associations.login");
    }



    // public function destroy(Association $association)
    // {
    //     $association->delete();
    // }

    // public function update(Request $request, Association $association)
    // {
    //     $validated = $request->validate([
    //         "name" => ["required", "string"],
    //         "email" => ["required", "email"],
    //     ]);
    //     $association->update($validated);
    // }


    public function show(Association $association)
    {
        return view("associations.show", ["association" => $association]);
    }
}
