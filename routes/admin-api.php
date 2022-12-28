<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\API;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('admin-dashboard',[ API\DashboardController::class, 'adminDashboard' ]);
    Route::post('category-save', [ App\Http\Controllers\CategoryController::class, 'store' ] );
    Route::post('category-delete/{id}', [ App\Http\Controllers\CategoryController::class, 'destroy' ] );
    Route::post('category-action',[ App\Http\Controllers\CategoryController::class, 'action' ]);
    Route::get('get-category-list',[API\CategoryController::class,'getCategoryList']);

    Route::get('get-service-list',[API\ServiceController::class,'getServiceList']);
    Route::post('service-action',[ App\Http\Controllers\ServiceController::class, 'action' ]);
    Route::post('get-service-detail', [ API\ServiceController::class, 'getServiceDetail' ] );
    
    Route::post('subcategory-save', [ App\Http\Controllers\SubCategoryController::class, 'store' ] );
    Route::post('subcategory-delete/{id}', [ App\Http\Controllers\SubCategoryController::class, 'destroy' ] );
    Route::post('subcategory-action',[ App\Http\Controllers\SubCategoryController::class, 'action' ]);
    Route::get('get-subcategory-list',[API\SubCategoryController::class,'getSubCategoryList']);

    Route::post('provider-save', [ App\Http\Controllers\ProviderController::class, 'store' ] );
    Route::post('provider-delete/{id}', [ App\Http\Controllers\ProviderController::class, 'destroy' ] );
    Route::post('provider-action',[ App\Http\Controllers\ProviderController::class, 'action' ]);

    Route::post('providertype-save', [ App\Http\Controllers\ProviderTypeController::class, 'store' ] );
    Route::post('providertype-delete/{id}', [ App\Http\Controllers\ProviderTypeController::class, 'destroy' ] );
    Route::post('providertype-action',[ App\Http\Controllers\ProviderTypeController::class, 'action' ]);

    Route::post('provideraddress-save', [ App\Http\Controllers\ProviderAddressMappingController::class, 'store' ] );
    Route::post('provideraddress-delete/{id}', [ App\Http\Controllers\ProviderAddressMappingController::class, 'destroy' ] );
    Route::post('provideraddress-action',[ App\Http\Controllers\ProviderAddressMappingController::class, 'action' ]);

    Route::post('providerdocument-save', [ App\Http\Controllers\ProviderDocumentController::class, 'store' ] );
    Route::post('providerdocument-delete/{id}', [ App\Http\Controllers\ProviderDocumentController::class, 'destroy' ] );
    Route::post('providerdocument-action',[ App\Http\Controllers\ProviderDocumentController::class, 'action' ]);

    Route::post('providerpayout-save', [ App\Http\Controllers\ProviderPayoutController::class, 'store' ] );
    
    Route::post('coupon-save', [ App\Http\Controllers\CouponController::class, 'store' ] );
    Route::post('coupon-delete/{id}', [ App\Http\Controllers\CouponController::class, 'destroy' ] );
    Route::post('coupon-action',[ App\Http\Controllers\CouponController::class, 'action' ]);
    Route::get('coupon-list',[API\CommanController::class,'getCouponList']);
    Route::get('get-coupon-service',[API\CommanController::class,'getCouponService']);


    Route::post('document-save', [ App\Http\Controllers\DocumentsController::class, 'store' ] );
    Route::post('document-delete/{id}', [ App\Http\Controllers\DocumentsController::class, 'destroy' ] );
    Route::post('document-action',[ App\Http\Controllers\DocumentsController::class, 'action' ]);

    Route::get('earning-list',[ App\Http\Controllers\EarningController::class, 'setEarningData' ]);
    Route::post('save-earning-setting', [ SettingController::class , 'saveEarningTypeSetting']);

    Route::get('get-type-list',[API\CommanController::class,'getTypeList']);

    Route::post('add-user',[API\User\UserController::class, 'addUser']);
    Route::post('edit-user',[API\User\UserController::class,'editUser']);
    Route::get('get-user-list',[API\User\UserController::class, 'userList']);

    Route::post('handymantype-save', [ App\Http\Controllers\HandymanTypeController::class, 'store' ] );
    Route::post('handymantype-delete/{id}', [ App\Http\Controllers\HandymanTypeController::class, 'destroy' ] );
    Route::post('handymantype-action',[ App\Http\Controllers\HandymanTypeController::class, 'action' ]);

    Route::post('user-delete/{id}', [ App\Http\Controllers\CustomerController::class, 'destroy' ] );
    Route::post('user-action',[ App\Http\Controllers\CustomerController::class, 'action' ]);

    Route::post('handyman-delete/{id}', [ App\Http\Controllers\CustomerController::class, 'destroy' ] );
    Route::post('handyman-action',[ App\Http\Controllers\CustomerController::class, 'action' ]);

    Route::post('provider-delete/{id}', [ App\Http\Controllers\ProviderController::class, 'destroy' ] );
    Route::post('provider-action',[ App\Http\Controllers\ProviderController::class, 'action' ]);

    Route::post('send-push-notification', [ App\Http\Controllers\SettingController::class , 'sendPushNotification']);
});
