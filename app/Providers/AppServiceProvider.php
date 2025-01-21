<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\xClientFormBody;
//use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Blade::aliasComponent('x-client-form-body', 'components.x-client-form-body');
        Blade::component('x-branch-form-body', xBranchFormBody::class);
        Blade::component('x-category-form-body', xCategoryFormBody::class);
        Blade::component('x-client-form-body', xClientFormBody::class);
        Blade::component('x-product-form-body', xProductFormBody::class);
        Blade::component('x-supplier-form-body', xSupplierFormBody::class);
    }
}
