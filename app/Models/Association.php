<?php

namespace App\Models;

use App\Models\Takeat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\TakeatRegistrationRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Association extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ["name", "email", "password", "state"];
    protected $hidden = ["password", "remember_token"];

    public function requests()    {
        return $this->hasMany(TakeatRegistrationRequest::class, "associations_id");
    }
}
