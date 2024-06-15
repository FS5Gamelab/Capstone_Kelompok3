<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seekers extends Model
{
    use HasFactory,SoftDeletes;

    public function applications()
    {
        return $this->hasMany(Applications::class, 'seeker_id');
    }

    protected $table = 'seekers';

    protected $fillable = [
        'user_id',
        'fullName',
        'address',
        'phone',
        'skills',
        'resume',
        'profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
