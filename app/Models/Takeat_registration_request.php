<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takeat_registration_request extends Model
{

    protected $fillable=(["email","time","associations_id"]);
    use HasFactory;
}
