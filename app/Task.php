<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Task extends Model
{
    //
    use SearchableTrait;

    protected $fillable = [
        'title',
        'description',
        'price',
        'country',
        'city'
    ];

   /* public function getPosterUsername()
    {
     	return User::where('id', $this->id)->first()->name;
        // return $this->belongsTo('App\User');
     } */
    
     //filling out the searchable areas
        protected $searchable = [
        'columns' => [
            'city' => 10,
        ],
    ];

     //filling out the searchable areas


    //test relations
     public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //test relations
}
