<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'companyName',
        'companyDescription',
        'companyAddress',
        'companyPhone',
    ];

    public function jobs()
    {
        return $this->hasMany(Jobs::class,'company_id');
    }
}
