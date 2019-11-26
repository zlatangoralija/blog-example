<?php

namespace App\Repositories\FilesUpload\Providers;


use Illuminate\Support\ServiceProvider;

class FilesUploadServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

}