<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use App\Models\TakeatRegistrationRequest;
use Exception;

class TakeatRegistrationRequestController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Association $association)
    {
        return view("takeat-registration.create", ["association" => $association]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($association_id, Request $request)
    {

        if ($request->user()->id != $association_id) {
            return response()->json([
                "error" => "vous n'avez pas acces à cette association !"
            ]);
        }

        $request->validate([
            "email" => ["required", "email", "string"],
            "time" => ["integer", "required"],
        ]);

        try {
            $takeatRegistrationRequest = TakeatRegistrationRequest::create([
                "email" => $request->email,
                "time" => $request->time,
                "associations_id" => $association_id
            ]);

            return response()->json($takeatRegistrationRequest);
        } catch (\Throwable $th) {
            return response()->withException($th);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
