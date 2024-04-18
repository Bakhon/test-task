<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Factories\DatabaseFeedbackFactory;
use App\Factories\FileFeedbackFactory;
use App\Factories\FeedbackFactoryInterface;

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
            return new DatabaseFeedbackFactory();
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
