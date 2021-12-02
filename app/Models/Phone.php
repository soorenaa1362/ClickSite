<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    protected $table = "phones";

    protected $timestamps = false;

    protected $fillable = [

    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
