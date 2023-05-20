<?php
/**
 * Created by PhpStorm.
 * User: Mohsin Ali Javed
 * Date: 5/20/2023
 * Time: 3:55 PM
 */

namespace bushart\emaillog;

use bushart\emaillog\EmailLog;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Mail\Events\MessageSending;


class EmailLogEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MessageSending::class => [
            EmailLog::class,
        ],
    ];
}