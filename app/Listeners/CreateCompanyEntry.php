<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Companies;

class CreateCompanyEntry
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CompanyCreated $event): void
    {
        $user = $event->user;

        Companies::create([
            'user_id' => $user->id,
            'CompanyName' => '',
            'CompanyDescription' => '', // Isi dengan data default atau data dari inputan yang relevan
            'CompanyAddress' => '', // Isi dengan data default atau data dari inputan yang relevan
            'CompanyPhone' => '', // Isi dengan data default atau data dari inputan yang relevan
        ]);
    }
}
