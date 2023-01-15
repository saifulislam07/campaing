<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message_id',
    ];



    public function camp()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function msg()
    {
        return $this->belongsTo(Message::class);
    }
}
