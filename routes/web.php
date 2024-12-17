<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\user\HomeController;
//use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;


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


Route::get('/', function () {
    return view('welcome');
});

// user auth login/register

Route::post('/login',[AuthController::class, 'authenticate']);
Route::get('/forgotPassword',[AuthController::class, 'forgotPassword'])->name('user.forgotPassword');
Route::post('/process-forgotPassword',[AuthController::class, 'processForgotPassword'])->name('user.processForgotPassword');

Route::group(['middleware' => 'auth'], function (){
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/home',[HomeController::class,'home'])->name('user.home');
Route::get('/user/services',[HomeController::class,'services'])->name('user.services');
Route::get('/user/sports',[HomeController::class,'sports'])->name('user.sports');
Route::get('/user/order',[OrderController::class,'index'])->name('user.order');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/checkout/{product}', [ProductController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [OrderController::class, 'store'])->name('place.order');
Route::post('/user/book', [OrderController::class,'store']);
Route::get('/user/about',[HomeController::class,'about'])->name('user.about');
Route::get('/user/myAccount',[HomeController::class,'myAccount'])->name('user.myAccount');
Route::get('/sports', [HomeController::class, 'sports'])->name('user.sports');
Route::get('/api/categories/{id}/products', [CategoryController::class, 'getProducts']);
Route::post('/api/checkout', [ProductController::class, 'checkout']);
Route::get('/getProducts/{id}',[ProductController::class, 'getProducts']);
Route::post('/addOrder',[OrderController::class,'storeOrder']);
Route::post('/user/myAccount/update', [HomeController::class, 'updateAccount'])->name('user.updateAccount');
Route::put('/updateOrder/{id}',[OrderController::class,'updateOrder']);
Route::put('/pickUpToProcess/{id}',[OrderController::class,'pickUpToProcess']);
Route::put('/readyForDelivery/{id}',[OrderController::class,'readyForDelivery']);
Route::put('/processToDelivery/{id}',[OrderController::class,'processToDelivery']);
Route::put('/deliveredOrder/{id}',[RiderController::class,'deliveredOrder']);
Route::get('/delivery',[RiderController::class,'deliveryView'])->name('rider.bookings.delivery');
Route::put('/processOrder/{id}',[OrderController::class,'processOrder']);
});

Route::middleware(['auth'])->group(function () {
    Route::put('/order/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');
    Route::put('/order/{id}/confirm-delivery', [OrderController::class, 'confirmDelivery'])->name('order.confirm-delivery');
    Route::get('/user/transactions', [App\Http\Controllers\User\TransactionController::class, 'index'])->name('user.transactions');
    Route::get('/user/transactions/{id}', [App\Http\Controllers\User\TransactionController::class, 'show'])->name('user.transactions.show');
});
//Route::middleware('guest')->group(function() {
    Route::view('/admin/login', 'admin.auth.login')->name('admin.login');
    Route::get('/rider/login', [RiderController::class, 'login'])->name('rider.login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register',[AuthController::class, 'registerPost']);
    Route::get('/login',[AuthController::class, 'login'])->name('user.login');

//})



//admin routes
Route::prefix('admin')->middleware(['admin'])->name('admin.')->group(function() {
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/order', [AdminDashboardController::class, 'order'])->name('order');
    Route::get('/history', [AdminDashboardController::class, 'history'])->name('history');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'show'])->name('transactions.show');
});




//admin routes
Route::get('admin/order',[AdminDashboardController::class,'order'])->name('admin.order');
Route::put('admin/update-order',[OrderController::class,'update']);
Route::get('admin/history',[AdminDashboardController::class, 'history']);



//rider-side route
Route::prefix('/rider')->middleware('rider')->group(function(){   
    Route::post('/login', [RiderController::class, 'authenticate']);
    Route::get('/dashboard', [RiderController::class, 'dashboard'])->name('rider.dashboard');
    Route::get('/bookings', [RiderController::class, 'bookings'])->name('rider.bookings');
    Route::get('/bookings/pending', [RiderController::class, 'pending'])->name('rider.bookings.pending');
    Route::get('/bookings/pick-up', [RiderController::class, 'pick_up'])->name('rider.bookings.pick-up');
    Route::get('/bookings/process', [RiderController::class, 'process'])->name('rider.bookings.process');
    Route::get('/bookings/delivery', [RiderController::class, 'delivery'])->name('rider.bookings.delivery');
    Route::put('/pick-up-to-process/{id}', [OrderController::class, 'pickUpToProcess'])->name('order.pickUpToProcess');
    Route::put('/process-to-delivery/{id}', [OrderController::class, 'processToDelivery'])->name('order.processToDelivery');
    Route::put('/mark-as-delivered/{id}', [OrderController::class, 'markAsDelivered'])->name('order.markAsDelivered');
    Route::get('/transaction-history', [RiderController::class, 'history'])->name('rider.transaction-history');
});

Route::get('/admin/check-new-orders', [AdminController::class, 'checkNewOrders'])
    ->name('admin.check-new-orders')
    ->middleware('auth:admin');