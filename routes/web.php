<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Public / Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function (Request $request) {
    // Ambil kategori untuk dropdown
    $categories = Category::orderBy('name')->get();

    // Query Produk dengan Filter
    $query = Product::with('category')->latest();

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->paginate(12);
    
    return view('welcome', compact('products', 'categories'));
});

Route::get('/welcome', function () {
    $products = Product::latest()->take(12)->get();
    return view('welcome', compact('products'));
})->name('welcome');

// Route Detail Produk (Publik/Tanpa Login)
Route::get('/product/{product}', function (Product $product) {
    return view('product-detail', compact('product'));
})->name('product.show');

// Route Keranjang (Cart) - Dipindahkan ke sini agar bisa diakses tanpa login
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Route Pembayaran (Checkout)
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // Route Riwayat Belanja (User)
    Route::get('/my-orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.') // This prefixes all names (e.g., admin.categories.index)
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::patch('/orders/{order}/confirm', [\App\Http\Controllers\Admin\OrderController::class, 'confirm'])->name('orders.confirm');
        Route::get('users', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        // Route Laporan
        Route::get('/reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');

        // Admin Logout Route
        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
});


/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:buyer'])->group(function () {
    Route::get('/buyer/dashboard', function () {
        return view('buyer.dashboard');
    })->name('buyer.dashboard');
});

// Route untuk registrasi buyer
Route::get('/register/buyer', function () {
    return view('auth.register_buyer');
})->name('register.buyer');

Route::post('/register/buyer', [AuthController::class, 'registerBuyer'])->name('register.buyer');