<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TransactionHistory;

class User extends Authenticatable {

    use HasApiTokens,
        HasFactory,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'user_code',
        'price',
        'first_name',
        'last_name',
        'email',
        'phone',
        'street_address',
        'apt_unit',
        'city',
        'state',
        'zip',
        'password',
        'is_plan_expired',
        'plan_start_date',
        'plan_end_date',
        'email_verified_at'
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

    public function isAdmin() {
        return $this->role_id == "2";
    }

    public function isUser() {
        return $this->role_id == "1";
    }

    public function transactionHistory() {
        return $this->hasOne(TransactionHistory::class, 'user_id', 'id');
    }

}
