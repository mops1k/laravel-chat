<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_message';

    protected $guarded = array();
    protected $fillable = ['message','room_id','user_id'];

    /**
     * @return Rooms
     */
    public function room()
    {
        return $this->belongsTo('\App\Models\Rooms');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
}
