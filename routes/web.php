<?php

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

Route::get('/', 'pageController@home');
Route::get('/frequently-asked-questions', 'pageController@faq');
Route::get('/contact', 'pageController@contact');
Route::post('/submitContact', 'contactController@submitContact');
Route::get('/terms-and-conditions', 'pageController@terms');
Route::get('/track-your-order', 'pageController@tracker');
Route::get('/search-negotiation', 'pageController@findnegotiation');
Route::post('/tracker', 'userController@tracker');
Route::get('/my-account', 'pageController@account');
Route::get('/my-payments', 'pageController@payments');
Route::get('/my-orders', 'pageController@orders');
Route::get('/my-negotiation', 'pageController@nego');
Route::post('/negtracker', 'userController@negtracker');


Route::get('/view-negotiation/{id}', 'pageController@viewnego');

Route::get('/view-order/{id}', 'pageController@vieworder');
Route::get('/edit-address', 'pageController@address');
Route::get('/update-address/{id}', 'pageController@editaddress');
Route::post('/updateShipping', 'userController@updateShipping');
Route::post('/updateBilling', 'userController@updateBilling');
Route::get('/edit-account', 'pageController@myaccount');
Route::post('/saveProfile', 'userController@saveProfile');
Route::post('/savePassword', 'userController@savePassword');
Route::post('/upPassword', 'userController@upPassword');
Route::get('/logs', 'pageController@logs');
Route::get('/logout', 'userController@logout');
Route::get('/shop', 'pageController@shop');
Route::get('/product-category/{id}', 'pageController@category');
Route::get('/product/{id}', 'pageController@product');
Route::get('/wishlist', 'pageController@wishlist');
Route::get('/remove_from_wishlist/{id}', 'productController@removewishlist');
Route::post('/search', 'productController@multiplesearch');
Route::post('/addreview', 'userController@addreview');

Route::get('/404', 'pageController@error404');



Route::get('/addwishlist', 'productController@addwishlist');
Route::get('/addcart', 'productController@addcart');
Route::get('/addcart2', 'productController@addcart2');
Route::get('/removecart/{id}', 'productController@removecart');

Route::get('/viewwishlist', 'productController@wishlist');
Route::get('/viewcart', 'productController@viewcart');
Route::get('/viewTotalAmount', 'productController@viewTotalAmount');
Route::get('/calcAmount', 'productController@calcAmount');




Route::get('/updatecart', 'productController@updatecart');

Route::get('/cart_details', 'pageController@cart_details');

Route::get('/account', 'pageController@login');
Route::post('/newRegister', 'loginController@newRegister');
Route::post('/login', 'loginController@login');
Route::get('/lost-password', 'pageController@recovery');
Route::post('/recovery', 'loginController@recovery');
Route::post('/resetpassword', 'loginController@newReset');





Route::get('/dashboard', 'pageController@adminhome');
Route::get('/newcategory', 'pageController@newcategory');
Route::post('/addCategory', 'categoryController@newcategory');
Route::get('/viewcategory', 'pageController@viewcategory');
Route::get('/viewcategory', 'categoryController@viewcategory');
Route::get('/deletecategory/{id}', 'categoryController@deletecategory');
Route::get('/editcategory/{id}', 'pageController@editcategory');
Route::post('/updateCategory', 'categoryController@updatecategory');
Route::get('/newproduct', 'pageController@newproduct');
Route::post('/addProduct', 'productController@newproduct');
Route::get('/viewproduct', 'pageController@viewproduct');
Route::get('/deleteproduct/{id}', 'productController@deleteproduct');
Route::get('/editproduct/{id}', 'pageController@editproduct');
Route::post('/updateProduct', 'productController@updateproduct');
Route::get('/addspecial/{id}', 'productController@addspecial');
Route::get('/viewspecialoffer', 'pageController@viewspecialoffer');
Route::get('/removespecial/{id}', 'productController@removespecial');
Route::get('/addfeatured/{id}', 'productController@addfeatured');
Route::get('/viewfeaturedproduct', 'pageController@viewfeaturedproduct');
Route::get('/removefeatured/{id}', 'productController@removefeatured');
Route::get('/useraccount', 'pageController@useraccount');
Route::get('/userorders', 'pageController@userorders');
Route::get('/userpayments', 'pageController@userpayments');
Route::get('/userhistory', 'pageController@userhistory');
Route::post('/userorderhistory', 'userController@searchuserorder');
Route::get('/vieworder/{id}', 'userController@vieworder');
Route::post('/userpaymenthistory', 'userController@searchuserpayment');
Route::post('/useractivityhistory', 'userController@useractivityhistory');
Route::get('/newbrand', 'pageController@newbrand');
Route::post('/addBrand', 'categoryController@newbrand');
Route::get('/viewbrand', 'pageController@viewbrand');
Route::get('/viewbrand', 'categoryController@viewbrand');
Route::get('/deletebrand/{id}', 'categoryController@deletebrand');
Route::get('/configure', 'pageController@configure');

Route::get('/cart', 'pageController@viewcart');
Route::get('/checkout', 'pageController@checkout');
Route::post('/saveorder', 'productController@saveorder');

Route::get('/pendingorders', 'userController@pendingorders');
Route::get('/orderhistory', 'userController@completeorders');
Route::get('/searchorder', 'pageController@searchorder');
Route::post('/getorderid', 'userController@getorderid');
Route::get('/updateorder/{orderid}/{status}', 'pageController@updateorder');
Route::get('/faq', 'pageController@adminfaq');
Route::get('/addfaq', 'pageController@adminaddfaq');
Route::get('/deletefaq/{id}', 'userController@delfaq');
Route::post('/newFaq', 'userController@addfaq');

Route::get('/slider', 'pageController@slider');
Route::get('/addslider', 'pageController@addslider');
Route::get('/deleteslider/{id}', 'userController@delslider');
Route::post('/newSlider', 'userController@addslider');

Route::get('/office_addresses', 'pageController@office');
Route::get('/addoffice', 'pageController@addoffice');
Route::get('/deleteoffice/{id}', 'userController@deloffice');
Route::post('/newOffice', 'userController@addoffice');
Route::get('/unreadmessage', 'pageController@unreadmessage');
Route::get('/messages', 'pageController@messages');
Route::get('/readmsg/{id}', 'pageController@readmsg');
Route::get('/chequepayments', 'pageController@chequepayments');
Route::get('/onlinepayments', 'pageController@onlinepayments');
Route::get('/payment_receipt/{id}', 'paymentController@receipt');

Route::get('/pendingnegotiation', 'pageController@pendingnegotiation');
Route::get('/negotiationhistory', 'pageController@negotiationhistory');
Route::get('/negotiation/{id}', 'pageController@negotiation');
Route::post('/addNegot', 'userController@addnegotiation');
Route::post('/closeNegot', 'userController@closenegotiation');
Route::post('/orderPrice', 'userController@orderPrice');


Route::post('/pay', 'paymentController@makePayment')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
