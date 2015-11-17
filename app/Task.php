<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
     protected $fillable = [
        'title',
        'description'
    ];

   /* public function getPosterUsername()
    {
     	return User::where('id', $this->id)->first()->name;
        // return $this->belongsTo('App\User');
     } */
}
