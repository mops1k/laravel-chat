<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function messages()
    {
        return $this->hasMany('\App\Models\ChatMessage','room_id');
    }
    public function users()
    {
        return $this->hasMany('\App\Models\ChatUsersOnline','room_id');
    }
}
