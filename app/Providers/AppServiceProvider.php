<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Mixins\StrMixins;
use App\Models\Channel;
use App\PostcardSendingService;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });

        // For facade
        $this->app->singleton('Postcard', function ($app) {
            return new PostcardSendingService('US', 4, 6);;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // For paginate the /posts page
        Paginator::useBootstrap();

        // Macros and mixins
        Str::macro('partNumber', function ($part) {
            return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        Str::mixin(new StrMixins());

        ResponseFactory::macro('errorJson', function ($message = 'Default error message') {
            return [
                'message' => $message,
                'error_code' => 123,
            ];
        });
    }
}
