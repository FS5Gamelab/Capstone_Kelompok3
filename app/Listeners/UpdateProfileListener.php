<?php
namespace App\Listeners;

use App\Events\ProfileUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProfileListener
{
    public function __construct()
    {
        //
    }

    public function handle(ProfileUpdated $event): void
    {
        $seeker = $event->seeker;
        // Handle the logic you want to perform after the profile is updated
    }
}