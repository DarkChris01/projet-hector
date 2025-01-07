<?php


namespace App\Services;

use App\Models\Association;

class AssociationsService
{

    public function get(Association $association)
    {

        return Association::where("id", $association->id)
            ->with("requests")
            ->first();
    }
}
