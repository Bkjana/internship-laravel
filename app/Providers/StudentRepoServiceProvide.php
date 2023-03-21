<?php

namespace App\Providers;

use App\Repositories\Interfaces\StudentRepoInterface;
use App\Repositories\StudentReposistory;
use Illuminate\Support\ServiceProvider;

class StudentRepoServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     /**
      * binding interface and class here
      */
    public function register()
    {
        //
        $this->app->bind(StudentRepoInterface::class,StudentReposistory::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
