<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Seekers;

class ProfileUpdated
{
    use Dispatchable, SerializesModels;

    public $seeker;

    public function __construct(Seekers $seeker)
    {
        $this->seeker = $seeker;
    }
}