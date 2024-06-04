<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applications extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'job_id',
        'seeker_id',
        'applicationDate',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function seeker()
    {
        return $this->belongsTo(Seekers::class);
    }
}
