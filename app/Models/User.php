<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'fname',
        'lname',
        'contact_number',
        'email',
        'password',
        'user_role_id',
        'is_primary_contact',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {      
        
        $url = URL::to('/auth/pass-reset?token='.$token);

        $this->notify(new ResetPasswordNotification($url));
    }

    public function rolesperuser(){
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }
}
