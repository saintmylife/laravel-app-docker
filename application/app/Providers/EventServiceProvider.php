<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        App\Modules\WorkOrder\Events\WorkOrderUploadCreated::class => [
            App\Modules\LotSummary\Listeners\CreateLotSummary::class,
        ],
        App\Modules\LotSummary\Events\LotSummaryCreated::class => [
            App\Modules\Bom\Listeners\CreateBom::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}
