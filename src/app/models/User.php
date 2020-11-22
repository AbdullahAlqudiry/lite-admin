<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function boot()
    {
        parent::boot();


        self::deleting(function($user){
            
            $user->syncRoles([]);

        });
    }

    /**
     * Scopes
     */

    /**
     * Search Scope
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('id', 'LIKE', '%'. $search .'%')
                    ->orWhere('name', 'LIKE', '%'. $search .'%')
                    ->orWhere('email', 'LIKE', '%'. $search .'%');
    }


    /**
     * relations
     */


    /**
     * Attributes
     */
    public function getRoleIdAttribute()
    {
        $role = $this->roles()->first();
        return optional($role)->id;
    }

    public function getRoleNameAttribute()
    {
        $role = $this->roles()->first();
        return optional($role)->name;
    }
}
