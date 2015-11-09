<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatUsersOnline extends Model
{
    protected $table = 'chat_users_online';

    protected $guarded = array();
    protected $fillable = ['room_id','user_id','last_activity'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function room()
    {
        return $this->belongsTo('\App\Models\Rooms');
    }
}
