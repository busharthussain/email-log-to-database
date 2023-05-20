<?php

namespace bushart\emaillog;
use Illuminate\Support\ServiceProvider;

class EmailLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->register(EmailLogEventServiceProvider::class);
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/migration/022_11_24_110854_create_email_logs_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_email_logs_table.php'),
        ], 'migrations');

    }
}
