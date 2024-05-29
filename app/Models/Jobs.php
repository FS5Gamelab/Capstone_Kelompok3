<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'jobTitle',
        'jobDescription',
        'jobRequire',
        'jobLocation',
        'jobType',
        'salary',
        'postedDate'
    ];

public function company(){
    return $this->belongsTo(Companies::class);
}
}


