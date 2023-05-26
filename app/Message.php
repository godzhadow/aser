<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['users_id', 'message', 'sender'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
