<?php

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
\Illuminate\Support\Facades\App::setLocale(\App\Models\SiteConfig::getConfig('language'));
require __DIR__.'/auth.php';
Route::group(['namespace'=>'front','prefix'=>'/','as'=>'front.'],function (){
    Route::get('/',[\App\Http\Controllers\Front\indexController::class,'index'])->name('index')->middleware('aktivation')->middleware('basket');
    Route::get('/'.__('activation'),function (){return view('auth.verify-email');})->name('activation');
    Route::get('/'.__('aboutus'),[\App\Http\Controllers\Front\indexController::class, 'aboutus'])->name('aboutus');
    Route::get('/'.__('termsconditions'),[\App\Http\Controllers\Front\indexController::class, 'termsConditions'])->name('termsconditions');
    Route::get('/'.__('privacypolicy'),[\App\Http\Controllers\Front\indexController::class, 'privacyPolicy'])->name('privacypolicy');
    Route::get('/'.__('faq'), [\App\Http\Controllers\Front\indexController::class, 'faq'])->name('faq');
    Route::get('/'.__('contactus'),[\App\Http\Controllers\Front\indexController::class, 'contact'])->name('contactus');
    Route::post('/'.__('contactus'),[\App\Http\Controllers\Front\indexController::class, 'contactMail'])->name('contactus.post');
    Route::get('/'.__('category').'/{permalink}',[\App\Http\Controllers\Front\categoryController::class, 'index'])->name('category');
    Route::get('/'.__('product').'/{permalink}',[\App\Http\Controllers\Front\productController::class,'index'])->name('product');
    Route::get('/'.__('cart'),[\App\Http\Controllers\Front\cartController::class,'checkoutCart'])->name('cart');
    Route::post('/'.__('cart').'/addcart',[\App\Http\Controllers\Front\cartController::class,'addToCart'])->name('addcart');
    Route::get('/'.__('cart').'/'.__('delete').'/{id}',[\App\Http\Controllers\Front\cartController::class, 'deleteItem'])->name('deleteItem');
    Route::get('/'.__('cart').'/'.__('clear'),[\App\Http\Controllers\Front\cartController::class, 'clearCart'])->name('clearCart');
    Route::get('/'.__('cart').'/'.__('completeshopping'),[\App\Http\Controllers\Front\cartController::class,'completeShopping'])->name('completeShopping');
    Route::post('/'.__('cart').'/'.__('completeshopping'),[\App\Http\Controllers\Front\cartController::class,'completeShoppingStore'])->name('completeShopping.post');
    Route::get('/'.__('myaccount'),[App\Http\Controllers\Front\accountController::class,'index'])->name('account')->middleware('account')->middleware('account');
    Route::post('/'.__('myaccount'),[\App\Http\Controllers\Front\accountController::class,'editUser'])->name('account.edit')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myaddresses'),[\App\Http\Controllers\Front\accountController::class, 'index'])->name('account.addresses')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myaddresses').'/'.__('create'),[\App\Http\Controllers\Front\accountController::class,'addAddress'])->name('account.addAddress')->middleware('account');
    Route::post('/'.__('myaccount').'/'.__('myaddresses').'/'.__('create'), [\App\Http\Controllers\Front\accountController::class, 'addAddressStore'])->name('account.addAddress.post')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myaddresses').'/'.__('edit').'/{id}',[\App\Http\Controllers\Front\accountController::class, 'editAddress'])->name('account.editAddress')->middleware('account');
    Route::post('/'.__('myaccount').'/'.__('myaddresses').'/'.__('edit').'/{id}',[\App\Http\Controllers\Front\accountController::class, 'editAddressUpdate'])->name('account.editAddress.post')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myaddresses').'/'.__('delete').'/{id}',[\App\Http\Controllers\Front\accountController::class, 'deleteAddress'])->name('account.deleteAddress')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myorders'),[\App\Http\Controllers\Front\accountController::class,'orders'])->name('account.orders')->middleware('account');
    Route::get('/'.__('myaccount').'/'.__('myorders').'/'.__('detail').'/{orderNumber}',[\App\Http\Controllers\Front\accountController::class,'orderDetails'])->name('account.orders.detail')->middleware('account');
    Route::get('/'.__('payment'),[\App\Http\Controllers\Front\PaymentController::class,'index'])->name('payment');
    Route::post('/'.__('payment'),[\App\Http\Controllers\Front\PaymentController::class,'callbackPayment'])->name('payment.post');
});


Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth', '\App\Http\Middleware\adminController']], function (){
    Route::get('/',[\App\Http\Controllers\Admin\Dashboard\indexController::class,'index'])->name('dashboard');
    Route::get('/'.__('categories'),[\App\Http\Controllers\Admin\Categories\indexController::class, 'index'])->name('category.index');
    Route::get('/'.__('categories').'/'.__('create'), [\App\Http\Controllers\Admin\Categories\indexController::class, "create"])->name('category.create');
    Route::post('/'.__('categories').'/'.__('create'), [\App\Http\Controllers\Admin\Categories\indexController::class, "store"])->name('category.create.post')->middleware('demo');
    Route::get('/'.__('categories').'/'.__('edit').'/{id}',[\App\Http\Controllers\Admin\Categories\indexController::class, 'edit'])->name('category.edit');
    Route::post('/'.__('categories').'/'.__('edit').'/{id}',[\App\Http\Controllers\Admin\Categories\indexController::class, 'update'])->name('category.edit.post')->middleware('demo');
    Route::get('/'.__('categories').'/'.__('delete').'/{id}',[\App\Http\Controllers\Admin\Categories\indexController::class, 'delete'])->name('category.delete')->middleware('demo');
    Route::post('/'.__('categories').'/ajax',[\App\Http\Controllers\Admin\Categories\indexController::class, 'getMainCategory'])->name('category.getMainCategory');
    Route::get('/'.__('products'), [\App\Http\Controllers\Admin\Products\indexController::class, 'index'])->name('product.index');
    Route::get('/'.__('products').'/'.__('create'), [\App\Http\Controllers\Admin\Products\indexController::class, 'create'])->name('product.create');
    Route::post('/'.__('products').'/'.__('create'),[\App\Http\Controllers\Admin\Products\indexController::class, 'store'])->name('product.create.post')->middleware('demo');
    Route::get('/'.__('products').'/'.__('edit').'/{id}',[\App\Http\Controllers\Admin\Products\indexController::class, 'edit'])->name('product.edit');
    Route::post('/'.__('products').'/'.__('edit').'/{id}',[\App\Http\Controllers\Admin\Products\indexController::class, 'update'])->name('product.edit.post')->middleware('demo');
    Route::get('/'.__('products').'/'.__('publish').'/{id}/{status}',[\App\Http\Controllers\Admin\Products\indexController::class, 'publishStatus'])->name('product.publish')->middleware('demo');
    Route::get('/'.__('products').'/'.__('status').'/{id}/{status}',[\App\Http\Controllers\Admin\Products\indexController::class, 'trendHotStatus'])->name('product.trendHotStatus')->middleware('demo');
    Route::get('/'.__('products').'/'.__('edit').'/'.__('images').'/{id}', [\App\Http\Controllers\Admin\Products\indexController::class, 'image'])->name('product.image');
    Route::post('/'.__('products').'/'.__('edit').'/'.__('images').'/{id}', [\App\Http\Controllers\Admin\Products\indexController::class, 'uploadImage'])->name('product.image.post')->middleware('demo');
    Route::get('/'.__('products').'/'.__('delete').'/'.__('images').'/{id}', [\App\Http\Controllers\Admin\Products\indexController::class, 'deleteImage'])->name('product.image.delete')->middleware('demo');
    Route::get('/'.__('orders').'/{status}', [\App\Http\Controllers\Admin\Orders\indexController::class,'index'])->name('orders.index');
    Route::get('/'.__('orders').'/'.__('edit').'/{orderNumber}', [\App\Http\Controllers\Admin\Orders\indexController::class,'orderDetail'])->name('orders.detail');
    Route::post('/'.__('orders').'/'.__('edit').'/{orderNumber}', [\App\Http\Controllers\Admin\Orders\indexController::class,'trackingNumber'])->name('orders.detail.post')->middleware('demo');
    Route::post('/'.__('orders').'/'.__('complete').'/{orderNumber}', [\App\Http\Controllers\Admin\Orders\indexController::class,'completeOrder'])->name('orders.complete.post')->middleware('demo');
    Route::get('/'.__('config'),[\App\Http\Controllers\Admin\Config\indexController::class,'index'])->name('config.index');
    Route::post('/'.__('config'),[\App\Http\Controllers\Admin\Config\indexController::class,'update'])->name('config.update')->middleware('demo');
    Route::get('/'.__('config').'/info',[\App\Http\Controllers\Admin\Config\indexController::class,'info'])->name('config.info');
    Route::post('/'.__('config').'/info',[\App\Http\Controllers\Admin\Config\indexController::class,'infoUpdate'])->name('config.info.update')->middleware('demo');
    Route::get('/'.__('config').'/'.__('faq'),[\App\Http\Controllers\Admin\Config\indexController::class,'faq'])->name('config.faq');
    Route::post('/'.__('config').'/'.__('faq'),[\App\Http\Controllers\Admin\Config\indexController::class,'faqupdate'])->name('config.faq.update')->middleware('demo');
    Route::get('/'.__('config').'/'.__('faq').'/'.__('delete').'/{id}',[\App\Http\Controllers\Admin\Config\indexController::class,'faqDelete'])->name('config.faq.delete')->middleware('demo');
    Route::post('/'.__('config').'/'.__('faq').'/'.__('create'),[\App\Http\Controllers\Admin\Config\indexController::class,'faqCreate'])->name('config.faq.create')->middleware('demo');
    Route::get('/'.__('banner'),[\App\Http\Controllers\Admin\Banners\indexController::class,'index'])->name('banners');
    Route::post('/'.__('banner'),[\App\Http\Controllers\Admin\Banners\indexController::class, 'store'])->name('banners.post')->middleware('demo');

});


