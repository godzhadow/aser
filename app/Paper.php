<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'paper';

    use \Conner\Tagging\Taggable;

    protected $fillable = ['users_id', 'title', 'abstract','abstract_status','payment_status','year','country'];
    /**
     * Get the user that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }
}
