<?php

namespace App\Models\MultiAuth;

use App\Models\Other\Image;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    //getters
    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getProfilePic(){
      if(Image::find($this->profile_pic)){
        return (Image::find($this->profile_pic))->uri;
      }
      else{
        return 'storage/images/temp.png';
      }
    }
}
