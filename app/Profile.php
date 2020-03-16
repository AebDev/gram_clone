<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function picture(){
        return '/storage/'.($this->image) ? $this->image : '/profile/uMeJZ4YoC4fcaWj0V91FgTmz54chb4NUf8hSuSae.png';
    }
}
