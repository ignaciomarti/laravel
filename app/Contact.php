<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Contact extends Model
{
    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'user_id'
    ];

    public function getFullName(){
        return $this->first_name . " " . $this->last_name;
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
