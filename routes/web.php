<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ModelContractController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/box', [BoxController::class, 'index'])->name('box.index');
    Route::get('/box/create', [BoxController::class, 'create'])->name('box.create');
    Route::get('/box/{id}', [BoxController::class, 'show'])->name('box.show');
    Route::post('/box', [BoxController::class, 'store'])->name('box.store');
    Route::get('/box/{id}/edit', [BoxController::class, 'edit'])->name('box.edit');
    Route::put('/box/{id}', [BoxController::class, 'update'])->name('box.update');
    Route::delete('/box/{id}', [BoxController::class, 'destroy'])->name('box.destroy');
    
    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant.index');
    Route::get('/tenant/create', [TenantController::class, 'create'])->name('tenant.create');
    Route::get('/tenant/{id}', [TenantController::class, 'show'])->name('tenant.show');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');
    Route::get('/tenant/{id}/edit', [TenantController::class, 'edit'])->name('tenant.edit');
    Route::put('/tenant/{id}', [TenantController::class, 'update'])->name('tenant.update');
    Route::delete('/tenant/{id}', [TenantController::class, 'destroy'])->name('tenant.destroy');
    
    Route::get('/model_contract', [ModelContractController::class, 'index'])->name('model_contract.index');
    Route::get('/model_contract/create', [ModelContractController::class, 'create'])->name('model_contract.create');
    Route::get('/model_contract/{id}', [ModelContractController::class, 'show'])->name('model_contract.show');
    Route::post('/model_contract', [ModelContractController::class, 'store'])->name('model_contract.store');
    Route::get('/model_contract/{id}/edit', [ModelContractController::class, 'edit'])->name('model_contract.edit');
    Route::put('/model_contract/{id}', [ModelContractController::class, 'update'])->name('model_contract.update');
    Route::delete('/model_contract/{id}', [ModelContractController::class, 'destroy'])->name('model_contract.destroy');
    
    Route::get('/contract', [ContractController::class, 'index'])->name('contract.index');
    Route::get('/contract/create', [ContractController::class, 'create'])->name('contract.create');
    Route::get('/contract/{id}', [ContractController::class, 'show'])->name('contract.show');
    Route::post('/contract', [ContractController::class, 'store'])->name('contract.store');
    Route::get('/contract/{id}/edit', [ContractController::class, 'edit'])->name('contract.edit');
    Route::put('/contract/{id}', [ContractController::class, 'update'])->name('contract.update');
    Route::delete('/contract/{id}', [ContractController::class, 'destroy'])->name('contract.destroy');
    
    Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
    Route::post('/bill', [BillController::class, 'store'])->name('bill.store');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::put('/payment/{bill_id}', [PaymentController::class, 'update'])->name('payment.update');

});

require __DIR__.'/auth.php';
