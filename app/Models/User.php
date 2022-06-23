<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\PasswordReset;
use App\Notifications\ResetPasswordNotification;


class User extends Authenticatable


{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_id',
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

    public function pekebun_kecil()
    {
        return $this->hasOne(PekebunKecil::class);
    }

    public function staf()
    {
        return $this->hasOne(Staf::class, 'id_Pengguna', 'id');
    }

    public function pencalonan()
    {
        return $this->hasMany(PencalonanPeserta::class, 'peserta','id');
    }

    public function pemohonan()
    {
        return $this->hasMany(Permohonan::class,'no_pekerja','id');
    }

    public function kehadiran_pl()
    {
        return $this->hasMany(KehadiranPusatLatihan::class);
    }

            /**
         * Send the password reset notification.
         *
         * @param  string  $token
         * @return void
         */
        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ResetPasswordNotification($token));
        }




}
