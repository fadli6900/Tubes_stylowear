
// Route Login & Logout (Manual Fix)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('admin/login', [AuthenticatedSessionController::class, 'createAdmin'])->name('admin.login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'storeAdmin'])->name('admin.login.store');
});
=======
// Route Login & Logout (Manual Fix)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('admin/login', [AuthenticatedSessionController::class, 'createAdmin'])->name('admin.login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'storeAdmin'])->name('admin.login.store');
});
