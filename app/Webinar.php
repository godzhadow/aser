<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $table = 'webinar';

    protected $fillable = ['type', 'title', 'image','users_id','start_date','price','link'];

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }
}
