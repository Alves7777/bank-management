<?php

namespace App\Providers;

use App\Abstracts\ApiResponseInterfaceService;
use App\Contracts\Payments\PaymentMethodInterface;
use App\Contracts\Payments\PaymentMethodResolverInterface;
use App\Contracts\Repositories\AccountRepositoryInterface;
use App\Contracts\Repositories\TransactionRepositoryInterface;
use App\Contracts\Services\AccountServiceInterface;
use App\Contracts\Services\TransactionServiceInterface;
use App\Core\Services\ApiResponseService;
use App\Payments\CreditCardPayment;
use App\Payments\DebitCardPayment;
use App\Payments\PaymentMethodResolver;
use App\Payments\PixPayment;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Transaction\TransactionRepository;
use App\Services\Account\AccountService;
use App\Services\Transaction\TransactionService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ApiResponseInterfaceService::class, ApiResponseService::class);

        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);

        $this->app->bind(AccountServiceInterface::class, AccountService::class);
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);

        $this->app->tag([
            PixPayment::class,
            CreditCardPayment::class,
            DebitCardPayment::class,
        ], PaymentMethodInterface::class);

        $this->app->singleton(PaymentMethodResolverInterface::class, function ($app) {
            $methods = [];

            foreach ($app->tagged(PaymentMethodInterface::class) as $method) {
                $methods[$method->code()] = $method;
            }

            return new PaymentMethodResolver($methods);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
