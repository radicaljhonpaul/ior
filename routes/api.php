<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\ProductRegistrationController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductRegistrationCommentsController;
use App\Http\Controllers\ShippingInvoicesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);

// Public routes

Route::post('/login', [AuthController::class, 'login']);
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/product-categories', [ProductCategoryController::class, 'index']);

Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-the-password', [AuthController::class, 'resetThePassword']);

// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/users', [AuthController::class, 'register']);
    Route::post('/register-primary-users', [AuthController::class, 'registerPrimaryUsers']);
    Route::post('/update-primary-users', [AuthController::class, 'updatePrimaryUsers']);
    Route::get('/admin-users', [UserController::class, 'fetchAdminUsers']);

    Route::get('/admin-user/{id}', [UserController::class, 'fetchAdminUser']);
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/contacts/{id}', [CompanyController::class, 'fetchContacts']);
    Route::get('/company/{id}', [CompanyController::class, 'fetchCompany']);
    Route::get('/company/company-products/{company_id}', [CompanyController::class, 'fetchCompanyProducts']);
    Route::post('/companies', [CompanyController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);


    Route::get('/role-user', [RolesAndPermissionsController::class, 'fetchRolesExceptCurrent']);

    
    Route::get('/product-registration', [ProductRegistrationController::class, 'index']);
    Route::post('/add-product-registration', [ProductRegistrationController::class, 'addProduct']);
    Route::get('/non-regulated-products', [ProductRegistrationController::class, 'getProducts']);
    Route::post('/product-registration-bulk-upload', [ProductRegistrationController::class, 'bulkProductUpload']);
    Route::get('/non-regulated-products-data/{id}', [ProductRegistrationController::class, 'getProductsDetails']);
    Route::post('/non-regulated-products-update', [ProductRegistrationController::class, 'updateProduct']);
    Route::delete('/non-regulated-products-delete/{id}', [ProductRegistrationController::class, 'destroyProduct']);
    Route::post('/comment', [ProductRegistrationController::class, 'comment']);
    Route::post('/add-product-registration-comment', [ProductRegistrationController::class, 'addComment']);
    Route::get('/admin/product-registration-comments/{id}', [ProductRegistrationCommentsController::class, 'getCommentsById']);
    Route::get('/non-regulated-product/{id}', [ProductRegistrationController::class, 'getProductById']);
    Route::get('/admin/non-regulated-products-pending', [ProductRegistrationController::class, 'getProductsPending']);
    Route::get('/admin/non-regulated-products-approved', [ProductRegistrationController::class, 'getProductsApproved']);
    Route::get('/admin/non-regulated-products-declined', [ProductRegistrationController::class, 'getProductsDeclined']);
    Route::post('/admin/product-registration-action', [ProductRegistrationController::class, 'productRegistrationAction']);
    
    Route::post('/admin/shipping-invoice/fba/add-shipping-invoice', [ShippingInvoicesController::class, 'storeShippingInvoice']);
    
    
    Route::post('/admin/update-product-registration', [ProductRegistrationController::class, 'updateProductRegistration']);
    Route::post('/admin/add-declined-message', [ProductRegistrationCommentsController::class, 'addDeclinedMessage']);
    Route::post('/company', [CompanyController::class, 'update']);
    Route::post('/admin-user', [UserController::class, 'update']);
    Route::delete('/company/{id}', [CompanyController::class, 'destroy']);
    Route::delete('/admin-user/{id}', [UserController::class, 'delete']);
    Route::get('/role-user', [RolesAndPermissionsController::class, 'fetchRolesExceptCurrent']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/reset-password', [UserController::class, 'updatePassword']);
    Route::post('/change-avatar',[UserController::class, 'changeAvatar']);


});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
