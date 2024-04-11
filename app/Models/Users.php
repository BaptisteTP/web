<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Contracts\Auth\MustVerifyEmail;


 
class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['first_name','last_name','email','password','center','promotion','roles_id','birthdate','visibility'];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public static function getVisibilityByEmail(string $email):int {
        $userData = Users::where('email', $email)->get();

        if (sizeof($userData) == 0){return 0;}
        elseif ( $userData[0]->visibility ==1 ){return 1;}
        else{return 2;}
        
    }

}
