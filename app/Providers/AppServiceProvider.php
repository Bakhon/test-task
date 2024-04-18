<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Factories\DatabaseFeedbackFactory;
use App\Factories\FileFeedbackFactory;
use App\Factories\FeedbackFactoryInterface;
use App\Factories\CompositeFeedbackFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FeedbackFactoryInterface::class, function ($app) {
            $databaseFactory = new DatabaseFeedbackFactory();
            $fileFactory = new FileFeedbackFactory();
        
            return new CompositeFeedbackFactory($databaseFactory, $fileFactory);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
