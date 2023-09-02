<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
    	'title', 'body', 'image', 'categroy_id', 'user_id', 'status'
    ];

    public function user($value='')
    {
    	return $this->belongsTo('App\User');
    }
}
