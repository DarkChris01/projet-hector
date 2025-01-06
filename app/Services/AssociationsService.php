<?php


namespace App\Services;

use App\Models\Association;

class AssociationsService
{

    public function get(Association $association)
    {
        dd($association );
        return Association::find($association->id)->with("takeat_registration_request")->first();

    }
}
