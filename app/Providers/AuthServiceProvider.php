<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\Supplier;
use App\Policies\CategoryPolicy;
use App\Policies\SupplierPolicy;
use App\Policies\NewsPolicy;
use App\Policies\UserPolicy;
use App\Policies\BannerPolicy;
use App\Policies\TaxPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PromotionPolicy;



use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
        Supplier::class => SupplierPolicy::class,
        News::class => NewsPolicy::class,
        User::class => UserPolicy::class,
        Tax::class => TaxPolicy::class,
        Banner::class => BannerPolicy::class,
        Order::class => OrderPolicy::class,
        Product::class => ProductPolicy::class,
        Promotion::class => PromotionPolicyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->groupGate();
        //
    }

    public function groupGate()
    {
        Gate::define('view-supplier', [SupplierPolicy::class, 'view']);
        Gate::define('view-news', [NewsPolicy::class, 'view']);
        Gate::define('view-user', [SupplierPolicy::class, 'view']);
        Gate::define('view-tax', [TaxPolicy::class, 'view']);
        Gate::define('view-banner', [BannerPolicy::class, 'view']);
        Gate::define('create-category', [CategoryPolicy::class, 'create']);
        Gate::define('edit-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
        Gate::define('view-order', [OrderPolicy::class, 'view']);
        Gate::define('view-product', [ProductPolicy::class, 'view']);
        Gate::define('view-promotion', [PromotionPolicy::class, 'view']);
    }
}