<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\CustomerController;






use App\Models\Supplier;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])
        ->name('admin.user.login');

    Route::post('login', [AuthController::class, 'checkLogin']);

    Route::get('register', [AuthController::class, 'register'])
        ->name('admin.user.register');

    Route::post('register', [AuthController::class, 'handleRegister']);

    Route::get('logout', [AuthController::class, 'handleLogout'])
        ->name('admin.logout');

    Route::get('confirm-email', [AuthController::class, 'confirmEmail'])
        ->name('admin.confirm.email');

    Route::post('confirm-email', [AuthController::class, 'confirmPost']);

    Route::get('change-password', [AuthController::class, 'viewPassword'])
        ->name('admin.change.password');

    Route::post('change-password', [AuthController::class, 'changePassword']);

    Route::get('forget-password', [AuthController::class, 'viewForget'])
        ->name('admin.forget.password');

    Route::get('confirm-pass', [AuthController::class, 'viewConfirm'])
        ->name('admin.confirm.emailForget');

    Route::post('confirm-pass', [AuthController::class, 'confirmForget']);

    Route::post('forget-password', [AuthController::class, 'forgetPassword']);
});
Route::prefix('admin')->middleware('admin.login')->group(function () {

    Route::get('index', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'index'])
            ->name('admin.category.list');

        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin.category.create');

        Route::post('create', [CategoryController::class, 'store']);

        Route::get('edit/{id}', [CategoryController::class, 'edit'])
            ->name('admin.category.edit');

        Route::post('edit/{id}', [CategoryController::class, 'update']);

        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');

        Route::get('view/{id}', [CategoryController::class, 'view'])
            ->name('admin.category.view');
    });
    Route::prefix('customers')->group(function () {
        Route::get('list', [CustomerController::class, 'index'])
            ->name('admin.customer');
    });
    Route::prefix('statistical')->group(function () {
        Route::get('list', [StatisticalController::class, 'index'])
            ->name('admin.statistical.list');

        Route::get('list-sales', [StatisticalController::class, 'sales'])
            ->name('supplier.statistical.list');
    });
    Route::prefix('rate')->group(function () {
        Route::get('list', [RateController::class, 'index'])
            ->name('admin.rate.list');

        Route::get('view/{id}', [RateController::class, 'view'])
            ->name('admin.rate.view');

        Route::get('delete/{id}', [RateController::class, 'delete'])
            ->name('admin.rate.delete');
    });
    Route::prefix('news')->group(function () {
        Route::get('list', [NewsController::class, 'index'])
            ->name('admin.news.list');

        Route::get('create', [NewsController::class, 'create'])
            ->name('admin.news.create');

        Route::post('create', [NewsController::class, 'store']);

        Route::get('update/{id}', [NewsController::class, 'update'])
            ->name('admin.news.update');

        Route::post('update/{id}', [NewsController::class, 'edit']);

        Route::get('delete/{id}', [NewsController::class, 'delete'])
            ->name('admin.news.delete');
    });
    Route::prefix('tax')->group(function () {
        Route::get('list', [TaxController::class, 'index'])
            ->name('admin.tax.list');

        Route::get('create', [TaxController::class, 'create'])
            ->name('admin.tax.create');

        Route::post('create', [TaxController::class, 'store']);

        Route::get('update/{id}', [TaxController::class, 'update'])
            ->name('admin.tax.update');

        Route::post('update/{id}', [TaxController::class, 'edit']);

        Route::delete('delete/{id}', [TaxController::class, 'delete'])
            ->name('admin.tax.delete');
    });
    Route::prefix('supplier')->group(function () {
        Route::get('list', [SupplierController::class, 'index'])
            ->name('admin.supplier.list');

        Route::get('create', [SupplierController::class, 'create'])
            ->name('admin.supplier.create');

        Route::post('create', [SupplierController::class, 'store']);

        Route::get('edit/{id}', [SupplierController::class, 'edit'])
            ->name('admin.supplier.edit');

        Route::post('edit/{id}', [SupplierController::class, 'update']);

        Route::get('view/{id}', [SupplierController::class, 'view'])
            ->name('admin.supplier.view');

        Route::get('delete/{id}', [SupplierController::class, 'delete'])
            ->name('admin.supplier.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'index'])
            ->name('admin.user.list');

        Route::get('create', [UserController::class, 'create'])
            ->name('admin.user.create');

        Route::post('create', [UserController::class, 'store']);

        Route::get('update/{id}', [UserController::class, 'update'])
            ->name('admin.user.edit');

        Route::post('update/{id}', [UserController::class, 'edit']);

        Route::get('view/{id}', [UserController::class, 'view'])
            ->name('admin.user.show');

        Route::get('delete/{id}', [UserController::class, 'delete'])
            ->name('admin.user.delete');
    });
});

Route::prefix('supplier')->group(function () {
    Route::prefix('order')->group(function () {
        Route::get('orders-new', [OrderController::class, 'ordersNew'])
            ->name('supplier.order.orders_new');

        Route::get('confirm/{id}', [OrderController::class, 'confirm'])
            ->name('supplier.order.confirm');

        Route::get('block/{id}', [OrderController::class, 'block'])
            ->name('supplier.order.block');

        Route::get('orders-shipping', [OrderController::class, 'ordersShiping'])
            ->name('supplier.order.orders_shipping');

        Route::get('orders-shipped/{id}', [OrderController::class, 'confirmShiped'])
            ->name('supplier.order.confirm_shipped');

        Route::get('order-shipped', [OrderController::class, 'ordersShipped'])
            ->name('supplier.order.orders_shipped');

        Route::get('orders-block', [OrderController::class, 'listOrderBlock'])
            ->name('supplier.order.orders_block');

        Route::get('order-delete/{id}', [OrderController::class, 'delete'])
            ->name('supplier.order.orders_delete');

        Route::get('orders-detail/{id}', [OrderController::class, 'orderDetail'])
            ->name('supplier.order.orders_detail');

        Route::post('insert-order', [OrderController::class, 'createOrder'])
            ->name('order.create');
        Route::get('block-order/{id}', [OrderController::class, 'blockfront'])
            ->name('front.order.block');
    });
    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'index'])
            ->name('supplier.product.list');

        Route::get('create', [ProductController::class, 'create'])
            ->name('supplier.product.create');

        Route::post('create', [ProductController::class, 'store']);

        Route::get('edit/{id}', [ProductController::class, 'edit'])
            ->name('supplier.product.edit');

        Route::post('edit/{id}', [ProductController::class, 'update']);

        Route::get('delete/{id}', [ProductController::class, 'delete'])
            ->name('supplier.product.delete');
    });
    Route::prefix('promotion')->group(function () {
        Route::get('list', [PromotionController::class, 'index'])
            ->name('supplier.promotion.list');

        Route::get('edit/{id}', [PromotionController::class, 'edit'])
            ->name('supplier.promotion.edit');

        Route::post('edit/{id}', [PromotionController::class, 'update']);

        Route::get('create', [PromotionController::class, 'create'])
            ->name('supplier.promotion.create');

        Route::post('create', [PromotionController::class, 'store']);

        Route::get('view/{id}', [PromotionController::class, 'promotionDetail'])
            ->name('supplier.promotion.view');

        Route::get('delete/{id}', [PromotionController::class, 'delete'])
            ->name('supplier.promotion.delete');

        Route::get('create-product/{id}', [PromotionController::class, 'formProductPromotion'])
            ->name('supplier.promotion.add_product');

        Route::post('create-product/{id}', [PromotionController::class, 'addProduct']);

        Route::get('delete-product/{id}', [PromotionController::class, 'deleteProduct'])
            ->name('supplier.promotion.delete_product');

        Route::get('update-product/{id}', [PromotionController::class, 'formUpdateProduct'])
            ->name('supplier.promotion.update_product');

        Route::post('update-product/{id}', [PromotionController::class, 'updateProduct']);
    });
});
Route::get('index/{id?}', [HomeController::class, 'index'])
    ->name('home');


Route::prefix('home')->group(function () {
    Route::get('product-detail/{id}', [ProductController::class, 'productDetail'])
        ->name('home.product.detail');

    Route::post('product-detail/{id}', [ProductController::class, 'rate'])->middleware('admin.login');

    Route::get('my-cart', [CartController::class, 'index'])
        ->name('home.cart.list');

    Route::get('add-cart/{id}', [CartController::class, 'addCart'])
        ->name('home.cart.add');

    Route::post('update-cart', [CartController::class, 'updateCart'])
        ->name('home.cart.update');

    Route::delete('delete-cart', [CartController::class, 'deleteCart'])
        ->name('home.cart.delete');

    Route::get('checkout', [OrderController::class, 'checkout'])->middleware('admin.login')
        ->name('home.checkout');

    Route::get('profile', [AccountController::class, 'index'])
        ->name('home.profile');

    Route::get('orders-confirm', [OrderController::class, 'userOrderNews'])
        ->name('home.orders_confirm');

    Route::get('orders-all', [OrderController::class, 'allOrder'])
        ->name('home.orders_all');

    Route::get('orders-ship', [OrderController::class, 'orderShip'])
        ->name('home.orders_ship');

    Route::get('orders-finish', [OrderController::class, 'orderFinish'])
        ->name('home.orders_finish');

    Route::get('orders-block', [OrderController::class, 'orderBlock'])
        ->name('home.orders_block');

    Route::get('order-back/{id}', [OrderController::class, 'orderBack'])
        ->name('home.orders_back');

    Route::get('payment', [PaymentController::class, 'index'])
        ->name('front.payment');
    Route::post('payment', [PaymentController::class, 'payment'])
        ->name('create.payment');

    Route::get('payment-success', [PaymentController::class, 'success'])
        ->name('create.payment.success');

    Route::get('news-detail/{id}', [NewsController::class, 'newsDetail'])
        ->name('home.news.detail');

    Route::get('search', [HomeController::class, 'search'])
        ->name('home.search');
});