<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    public function camp()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function subscribe()
    {
        return $this->belongsTo(subscribe::class);
    }
}
