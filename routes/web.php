<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SingleProductContoller;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ShipmentsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('template.home.home');
// })->name('home');
Route::get('/shop/{id}', [ProductsController::class, 'productCategory'])->name('shop');
Route::get('/shop', [ProductsController::class, 'allProduct'])->name('allProduct');
// Route::get('shop', function () {
//     return view('template.product.product');
// })->name("shop");
Route::get('single/{id}', [SingleProductContoller::class, 'index'])->name('product.single');
// Route::get('single/{id}', function () {
//     return view('template.singleProduct.singleProduct');
// })->name("product.single");
// Route::get('cart', [CartsController::class, 'create'])->name('cart');
Route::get('cart/{id}', [CartsController::class, 'store'])->name('cart');
Route::get('cart', [CartsController::class, 'index'])->name('cart.index');
Route::get('delete/{id}', [CartsController::class, 'destroy'])->name('cart.destroy');
Route::get('carts', [CartsController::class, 'coupon'])->name('coupon');
Route::get('cartss', [CartsController::class, 'state'])->name('state');
Route::post('cartsss/{id}', [CartsController::class, 'addQuantity'])->name('addQuantity');


Route::get('checkout', [ShipmentsController::class, 'index'])->name("checkout");
Route::post('checkout', [ShipmentsController::class, 'store'])->name("checkout.store");
// Route::get('cart', function () {
//     return view('template.cart.cart');
// })->name("cart");
Route::get('about', function () {
    return view('template.about.about');
})->name("about");
Route::get('contact', function () {
    return view('template.contact.contact');
})->name("contact");
Route::get('blog', function () {
    return view('template.blog.blog');
})->name("blog");
Route::get('singleBlog', function () {
    return view('template.singleBlog.singleBlog');
})->name("singleBlog");
Route::get('profilee', function () {
    return view('template.profile.profile');
})->name("profilee");

Route::get('login1', function () {
    return view('template.login&register.login');
})->name("login1");
// Route::get('dash', function () {
//     return view('template.pages.dashboard');
// })->name("dash");

// Route::get('/', function () {
//     return view('template.pages.dashboard');
// })->name('dashboard');
Route::get('/tables', function () {
    return view('template.pages.tables');
})->name('tables');
// Route::get('/products', function () {
//     return view('template.pages.products');
// })->name('products');
Route::get('/sign', function () {
    return view('template.pages.sign-in');
})->name('sign');
Route::get('/profiled', function () {
    return view('template.pages.profile');
})->name('profiled');

// Route::get('/admins', [AdminsController::class, 'index'])->name('admins');
// Route::get('/create', [AdminsController::class, 'create'])->name('create');
// Route::post('/create', [AdminsController::class, 'store'])->name('store');
// Route::get('/create/{admin}/edit', [AdminsController::class, 'edit'])->name('update');
// Route::put('/create/{admin}', [AdminsController::class, 'update']);
// Route::delete('/create/{admin}', [AdminsController::class, 'destroy']);


Route::resource('admins', AdminsController::class);
Route::resource('products', ProductsController::class);
Route::resource('categories', CategoriesController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('checkout', [ShipmentsController::class, 'index'])->name("checkout");
});


// Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard',[AdminsController::class, 'index'])->name('dashboard');
// });

require __DIR__ . '/auth.php';






// Route::get('/categories', [ProductsController::class, 'searchByName'])->name('searchByName');
// Route::get('/categoriess', [ProductsController::class, 'cat'])->name('cat');

Route::post('/store-shipment', [ShipmentsController::class, 'store'])->name('checkout.store');
Route::get('paypal/success', [ShipmentsController::class, 'success'])->name('   ');
Route::get('paypal/cancel', [ShipmentsController::class, 'cancel'])->name('paypal_cancel');
