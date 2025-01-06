<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;
    protected $fillable = ["name", "email", "password", "state"];

    public function takeat_registration_request()
    {
        return $this->belongsTo(TakeatRegistrationRequest::class);
    }
}
