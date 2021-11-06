<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "priority",
        "user_id",
        "description",
        "dateOfDelivery",
        "data",
        "status "
    ];
    public function MissionUser() {
        return $this->belongsTo(User::class);
    }
}
