<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

	protected $fillable = ['content']; 

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
