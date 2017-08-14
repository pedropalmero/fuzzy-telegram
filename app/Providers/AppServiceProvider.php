<?php

namespace App\Providers;

use App\Client\QuoteRestClient;
use App\Quote;
use App\Repository\QuoteRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $quoteRestClient = new QuoteRestClient();
        $this->app->instance(QuoteRestClient::class, $quoteRestClient);

        $quoteModel = new Quote();
        $quoteRepository = new QuoteRepository($quoteModel);
        $this->app->instance(QuoteRepository::class, $quoteRepository);
    }
}
