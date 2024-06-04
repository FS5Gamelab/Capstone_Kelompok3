<?php

namespace App\Models;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'company_id',
        'jobTitle',
        'jobDescription',
        'jobRequire',
        'jobLocation',
        'jobType',
        'salary',
        'jobStatus',
        'postedDate'
    ];

public function company(){
    return $this->belongsTo(Companies::class);
}

public function applications(){

    return $this->hasMany(Applications::class);
}
}


