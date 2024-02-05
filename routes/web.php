<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ChangeRoleController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\TopCustomerController;

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

Auth::routes([
    'verify' => true,
]);

Route::get('/', [AboutUsController::class, 'index'])->name('about.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('marketplace', [ProductController::class, 'marketplace'])->name('marketplace');
    Route::get('quotation', [QuotationController::class, 'index'])->name('quotation.index');
    Route::get('quotation-cancelled/{quotation}', [QuotationController::class, 'cancel'])->name('quotation.cancel');
    Route::post('quotation-complete/{quotation}', [QuotationController::class, 'complete'])->name('quotation.complete');
    Route::get('admin-supplier', [ChangeRoleController::class, 'adminIndex'])->name('admin-supplier.index');
    Route::resource('sales-report', SalesReportController::class);
    Route::get('sales-date/{salesDate}', [SalesReportController::class, 'view'])->name('sales-report.view');
    Route::delete('sales-date/{salesDate}', [SalesReportController::class, 'delete'])->name('sales-report.delete');
    Route::get('staffs', [HomeController::class, 'staffs'])->name('staffs');
    Route::get('order/{product}', [OrderController::class, 'show'])->name('order.show');
    Route::resource('order', OrderController::class)->except('show');
    Route::get('admin-orders', [OrderController::class, 'adminOrder'])->name('adminOrder');
    Route::get('cancel-order/{order}', [OrderController::class, 'cancel'])->name('order.cancel');
    Route::get('complete-order/{order}', [OrderController::class, 'complete'])->name('order.complete');
    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::post('change-password/{id}', [InventoryController::class, 'changePassword'])->name('inventory.password');
    Route::get('create-inventory/{id}', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('store-inventory', [InventoryController::class, 'add'])->name('inventory.store');
    
    Route::get('inventory-update/{id}', [ProductController::class, 'show'])->name('prod.update');
    
    Route::get('quotationPdf/{quotation}', [QuotationController::class, 'downloadFile'])->name('download.pdf');

    // PDF
    Route::get('pdf/{id}', [OrderController::class, 'receiptOrder'])->name('receipt');
    Route::get('salespdf/{id}', [SalesReportController::class, 'salesReport'])->name('salespdf');

    Route::middleware('role:admin')->group(function () {
        // QOUTATION
        Route::delete('quotation/{quotation}', [QuotationController::class, 'destroy'])->name('quotation.destroy');
        Route::post('quotation-archive/{quotation}', [QuotationController::class, 'archive'])->name('quotation.archive');
        Route::post('restore/{quotation}', [QuotationController::class, 'restore'])->name('qoutation.restore');
        Route::get('archive', [QuotationController::class, 'archiveTable'])->name('archive.table');
        //Order
        Route::get('restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
        Route::post('order-archive/{order}', [OrderController::class, 'archive'])->name('order.archive');
        Route::get('archive-order', [OrderController::class, 'archiveTable'])->name('table.order');

        Route::resource('top-customer', TopCustomerController::class);
        Route::post('about-us/{aboutUs}', [AboutUsController::class, 'update'])->name('about.update');
        Route::get('about-us/create', [AboutUsController::class, 'create'])->name('about.create');
        Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('users', UserController::class);
        Route::get('suppliers', [UserController::class, 'suppliers'])->name('users.suppliers');
        Route::delete('admin-supplier/{changeRole}', [ChangeRoleController::class, 'destroy'])->name('admin-supplier.destroy');
        Route::get('admin-supplier/{changeRole}', [ChangeRoleController::class, 'approve'])->name('admin-supplier.approved');
        Route::post('admin-supplier/{changeRole}/reject', [ChangeRoleController::class, 'reject'])->name('admin-supplier.reject');
        Route::get('active-product/{product}', [ProductController::class, 'activeProduct'])->name('activeProduct');
        Route::get('main-product/{product}', [ProductController::class, 'mainProduct'])->name('mainProduct');
        Route::get('normal-product/{product}', [ProductController::class, 'normalProduct'])->name('normalProduct');
        Route::get('audit', [AuditController::class, 'index'])->name('audit.index');
        Route::get('approved-user/{user}', [UserController::class, 'approved'])->name('approved.user');
    });

    Route::middleware('role:supplier')->group(function () {
        Route::get('/supplier-home', [App\Http\Controllers\HomeController::class, 'supplierHome'])->name('supplierHome');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('customer-dashboard', [HomeController::class, 'userHome'])->name('userHome');
        Route::resource('supplier-request', ChangeRoleController::class)->only('store', 'index');
    });
    Route::resource('quotation', QuotationController::class)->except('index', 'destroy');

    // Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
