<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\model;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email',"username", 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username,
                'image' => 'profile/uMeJZ4YoC4fcaWj0V91FgTmz54chb4NUf8hSuSae.png',
            ]);

            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });

        
    }

    public function profile(){
        return $this->hasOne(profile::class);
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','Desc');
    }
}
