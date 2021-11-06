<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        "image",
        "userName",
        "email",
        "password",
        "phone",
        "role_id "
    ];
    public function UserRole() {
        return $this->belongsTo(role::class);
    }
    public function UserSite() {
        return $this->hasMany(Site::class);
    }
    public function UserMission() {
        return $this->hasMany(Mission::class);
    }
    
}
