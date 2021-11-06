<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "mode",
        "latitude",
        "longitude",
        "height",
        "client "
    ];
    public function SiteUser() {
        return $this->belongsTo(User::class);
    }
}
