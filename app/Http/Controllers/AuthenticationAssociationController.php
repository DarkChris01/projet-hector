<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\TakeatRegistrationRequest;
use App\Services\AssociationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationAssociationController extends Controller
{

    public function __construct(private AssociationsService $associationsService) {}
    public function login(Request $request)
    {
        $request->validate([
            "email" => ["required", "string", "email"],
            "password" => ["required", "string"]
        ]);
        $association = Association::where("email", $request->email)->first();
        if (Hash::check($request->password, $association->password)) {
            $datas = $this->associationsService->get($association);
            return to_route("association.show", [
                "association" => $datas
            ]);
        }
        return back()->with("error", "probleme lors de la connexion");
    }
}
