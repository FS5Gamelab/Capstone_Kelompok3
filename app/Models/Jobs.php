<?php

namespace App\Models;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'category_id',
        'jobTitle',
        'jobDescription',
        'jobRequire',
        'jobLocation',
        'jobType',
        'salary',
        'jobStatus',
        'postedDate'
    ];

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo(Companies::class,'company_id');
    }

    public function applications()
    {
<<<<<<< HEAD

=======
>>>>>>> 9583c031d6401a3c18559d6f97942a78afddb1a6
        return $this->hasMany(Applications::class, 'job_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
