<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'categoryName',
        'categoryDescription',
    ];

    protected $dates = ['deleted_at'];

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }

}
