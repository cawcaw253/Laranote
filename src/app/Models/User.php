<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'account_name'
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

    /**
     * @param Builder $query
     * @param string $email
     * @return Builder
     */
    public function scopeFromEmail($query, string $email)
    {
        return $query->where('email', $email);
    }

    /**
     * @param Builder $query
     * @param string $accountName
     * @return Builder
     */
    public function scopeFromAccountName($query, string $accountName)
    {
        return $query->where('account_name', $accountName);
    }
}
