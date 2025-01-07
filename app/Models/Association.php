<?php

namespace App\Models;

use App\Models\Takeat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Association extends Model
{
    use HasFactory;
    protected $fillable = ["name", "email", "password", "state"];

    public function requests()
    {
        return $this->hasMany(Takeat_registration_request::class,"associations_id");
    }
}
