<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Frontend
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories')->name('collections');
    Route::get('/collections/{category_slug}', 'products')->name('showCollection');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView')->name('viewProductsDet');

    Route::get('/new-arrivals', 'newArrival')->name('new-arrivals');
    Route::get('/featured-products', 'featured')->name('featured-products');

    Route::get('search-products', 'searchProducts')->name('search');
});

Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('orders', [OrderController::class, 'index'])->name('order');
    Route::get('orders/{orderId}', [OrderController::class, 'show'])->name('showOrder');
    // Thank you page for checkout
    Route::view('/thankyou', 'frontend.thank-you')->name('thank-you');

    // Profil
    Route::controller(FrontendUserController::class)->group(function () {
        Route::get('profile', 'index')->name('user.profile');
        Route::post('profile', 'updateUserDetails')->name('user.profile.update');
        Route::get('change-password', 'changePassword')->name('user.profil.change-password');
        Route::post('change-password', 'updatePassword')->name('user.profil.update-password');
    });
});


//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


    //category routes
    Route::get('/category', [CategoryController::class, 'index'])->name('homeCategory');
    Route::get('/category/create', [CategoryController::class, 'create'])->name("addCategory");
    Route::post('/category', [CategoryController::class, 'store'])->name('saveCategory');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('updateCategory');

    //brands
    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brands');

    //products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('homeProducts');
        Route::get('/products/create', 'create')->name('addProduct');
        Route::post('/products', 'store')->name('storeProduct');
        Route::get('/products/{product}/edit', 'edit')->name('editProduct');
        Route::put('/products/{product}/', 'update')->name('updateProduct');
        Route::get('/products/{product}/delete', 'destroy')->name('deleteProduct');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage')->name('deleteProductImage');
        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty')->name('updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColor')->name('deleteProdColor');
    });

    //colors
    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors', 'index')->name('homeColor');
        Route::get('/colors/create', 'create')->name('addColor');
        Route::post('/colors', 'store')->name('storeColor');
        Route::get('/colors/{color}/edit', 'edit')->name('editColor');
        Route::put('/colors/{color}', 'update')->name('updateColor');
        Route::get('/colors/{color}/delete', 'destroy')->name('deleteColor');
    });

    //Slider
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index')->name('homeSlider');
        Route::get('/sliderq/create', 'create')->name('addSlider');
        Route::post('/sliders', 'store')->name('storeSlider');
        Route::get('/sliders/{slider}/edit', 'edit')->name('editSlider');
        Route::put('/sliders/{slider}', 'update')->name('updateSlider');
        Route::get('/sliders/{slider}/delete', 'destroy')->name('deleteSlider');
    });

    // Orders
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders');
        Route::get('/orders/{id}', 'show')->name('admin.showOrder');
        Route::put('/orders/{id}', 'updateOrderStatus')->name('updateOrderStatus');

        Route::get('/invoice/{id}', 'viewInvoice')->name('viewInvoice');
        Route::get('/orders/{id}/generate', 'generateInvoice')->name('generateInvoice');
    });

    //Settings
    Route::controller(SettingController::class)->group(function () {
        Route::get('settings', 'index')->name('settings');
        Route::post('settings', 'store')->name('storeSettings');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.users');
        Route::get('users/create', 'create')->name('admin.users.create');
        Route::post('users', 'store')->name('admin.users.store');
        Route::get('users/{id}/edit', 'edit')->name('admin.users.edit');
        Route::put('users/{id}', 'update')->name('admin.users.update');
        Route::get('users/{id}/delete', 'destroy')->name('admin.users.delete');
    });
});
