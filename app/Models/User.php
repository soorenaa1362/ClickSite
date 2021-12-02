<?php

namespace App\Models;

use App\Models\Phone;
use App\Scopes\TestScope;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];


    protected $dates = ['deleted_at'];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // protected static function boot()
    // {
    //     parent::boot();
    //     // static::addGlobalScope(new TestScope); 
        
    //     static::addGlobalScope('test', function(Builder $builder){
    //         $builder->where('status', 1);
    //     }); 
    // }


    // Local Static Scope :
    // public function scopeStatus($query)
    // {
    //     return $query->where('status', 1);
    // }


    // Local Dynamic Scope :
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    public function Phone()
    {
        return $this->hasOne(Phone::class);
    }


    public function Post()
    {
        return $this->hasMany(Post::class);
    }

}
