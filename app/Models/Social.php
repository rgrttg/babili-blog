<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = ['platform', 'profile_url', 'username'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
