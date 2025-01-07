<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use App\Models\Takeat_registration_request;
use Nette\Utils\Random;

class Takeat_registration_requestController extends Controller
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
    public function store(Request $request)
    {

        $request->validate([
            "email" => ["required", "email", "string"],
            "time" => ["integer", "required"],
            "association" => ["integer", "exists:associations,id"]
        ]);

        $random = random_int(100000, 999999);
        
        Takeat_registration_request::create([
            "email" => $request->email,
            "time" => $request->time,
            "associations_id" => $request->association
        ]);
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
