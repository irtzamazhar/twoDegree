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
//Admin Routes
Auth::routes();

//Blog Route
Route::get('/admin/blog', 'BlogController@index')->name('admin/blog');
Route::get('/admin/blog/create', 'BlogController@create')->name('createPost');
Route::post('createBlogPost', 'BlogController@store')->name('createBlogPost');
Route::get('/admin/blog/deletePost/{id}', 'BlogController@destroy')->name('deleteBlog');
Route::get('/admin/blog/editPost/{id}', 'BlogController@edit')->name('editBlogPost');
Route::post('/admin/blog/update/{id}', 'BlogController@update')->name('updateBlogPost');
Route::get('/admin/blog/showPost/{id}', 'BlogController@show')->name('showBlogPost');
Route::get('/admin/blog/addBanner', 'BlogController@addBanner')->name('addBlogBanner');
Route::post('/admin/blog/addBanner{id}', 'BlogController@storeBanner')->name('storeBlogBanner');

//Site Event Route
Route::get('/admin/event', 'SiteEventsController@index')->name('admin/event');
Route::get('/admin/event/create', 'SiteEventsController@create')->name('createEvent');
Route::post('createEvent', 'SiteEventsController@store')->name('createEvent');
Route::get('/admin/event/editEvent/{id}', 'SiteEventsController@edit')->name('editEvent');
Route::post('/admin/event/update/{id}', 'SiteEventsController@update')->name('updateEvent');
Route::get('/admin/event/showEvent/{id}', 'SiteEventsController@show')->name('showEvent');
Route::get('/admin/event/deleteEvent/{id}', 'SiteEventsController@destroy')->name('deleteEvent');
Route::get('/admin/event/addBanner', 'SiteEventsController@addBanner')->name('addEventBanner');
Route::post('/admin/event/addBanner{id}', 'SiteEventsController@storeBanner')->name('storeEventBanner');

//Contact Route
Route::get('/admin/contact', 'ContactController@index')->name('admin/contact')->middleware('auth');
Route::get('/admin/contact/delete/{id}', 'ContactController@destroy')->name('deleteContact')->middleware('auth');
Route::get('/admin/contact/showContact/{id}', 'ContactController@show')->name('showContact')->middleware('auth');
Route::get('/admin/contact/addBanner', 'ContactController@addBanner')->name('addContactBanner')->middleware('auth');
Route::post('/admin/contact/addBanner{id}', 'ContactController@storeBanner')->name('storeContactBanner')->middleware('auth');

//Newsletter Route
Route::get('/admin/newsletter','NewsletterEmailController@index')->name('newsletter')->middleware('auth');
Route::post('subscribe','NewsletterEmailController@subscribe')->name('subscribe')->middleware('auth');
Route::post('checkEmail', 'NewsletterEmailController@checkEmail')->name('checkEmail')->middleware('auth');

//Pages Route
Route::get('/admin/pages', 'PagesController@index')->name('admin/pages');
Route::get('/admin/pages/create', 'PagesController@create')->name('createPage');
Route::post('createPage', 'PagesController@store')->name('createPage');
Route::get('/admin/pages/deletePage/{id}', 'PagesController@destroy')->name('deletePage');
Route::get('/admin/pages/editPage/{id}', 'PagesController@edit')->name('editPage');
Route::post('/admin/pages/update/{id}', 'PagesController@update')->name('updatePage');
Route::get('/admin/pages/showPage/{id}', 'PagesController@show')->name('showPage');

//Homepage Route
Route::get('/admin/home', 'HomePageController@index')->name('admin/home');
Route::get('/admin/home/create', 'HomePageController@create')->name('createSection');
Route::post('createSection', 'HomePageController@store')->name('createSection');
Route::get('/admin/home/delete/{id}', 'HomePageController@destroy')->name('deleteSection');
Route::get('/admin/home/edit/{id}', 'HomePageController@edit')->name('editSection');
Route::post('/admin/home/update/{id}', 'HomePageController@update')->name('updateSection');
Route::get('/admin/home/show/{id}', 'HomePageController@show')->name('showSection');

//Menu Route
Route::get('/admin/menu', 'MenuController@create')->name('admin/menu');
Route::post('/insertData', 'MenuController@store')->name('insertData1');

//FAQ's Route
Route::get('/admin/faq', 'FaqsController@index')->name('admin/faq');
Route::get('/admin/faq/create', 'FaqsController@create')->name('createFaq');
Route::post('createFaq', 'FaqsController@store')->name('createFaq');
Route::get('/admin/faq/deleteFaq/{id}', 'FaqsController@destroy')->name('deleteFaq');
Route::get('/admin/faq/editFaq/{id}', 'FaqsController@edit')->name('editFaq');
Route::post('/admin/faq/update/{id}', 'FaqsController@update')->name('updateFaq');
Route::get('/admin/faq/showFaq/{id}', 'FaqsController@show')->name('showFaq');
Route::get('/admin/faq/addBanner', 'FaqsController@addBanner')->name('addFaqBanner');
Route::post('/admin/faq/addBanner{id}', 'FaqsController@storeBanner')->name('storeFaqBanner');

//Home Route
Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/widgets', 'HomeController@widgets')->name('widgets');
Route::get('/admin/table', 'HomeController@table')->name('table');
Route::get('/admin/profile', 'ProfileController@profile')->name('profile');
Route::post('/admin/update/{id}', 'ProfileController@update')->name('update');

//Shop Route
Route::get('/admin/shop', 'ShopController@index')->name('admin/shop')->middleware('auth');
Route::get('/admin/shop/createProduct', 'ShopController@create')->middleware('auth');
Route::post('createShopProduct', 'ShopController@store')->name('createShopProduct')->middleware('auth');
Route::get('/admin/shop/deleteProduct/{id}', 'ShopController@destroy')->name('deleteProduct')->middleware('auth');
Route::get('/admin/shop/editProduct/{id}', 'ShopController@edit')->name('editProduct')->middleware('auth');
Route::post('/admin/shop/update/{id}', 'ShopController@update')->name('updateShopProduct')->middleware('auth');
Route::get('/admin/shop/showProduct/{id}', 'ShopController@show')->name('showProduct')->middleware('auth');
Route::get('/admin/shop/addShopBanner', 'ShopController@addBanner')->name('addShopBanner')->middleware('auth');
Route::post('/admin/shop/addShopBanner{id}', 'ShopController@storeBanner')->name('storeShopBanner')->middleware('auth');




// frontend routes
Route::get('/', 'FrontendController@index');
Route::get('/app-download', 'FrontendController@app');
Route::get('view/{page_url}', 'FrontendController@getPage');
Route::get('/faq', 'FrontendController@faq');
Route::get('contact', 'FrontendController@contact')->name('contact');
Route::post('createContact', 'ContactController@store')->name('createContact');
Route::get('blog', 'FrontendController@blog');
Route::get('blog-detail/{slug}', 'FrontendController@blogDetail')->name('blog-detail');
Route::get('events', 'FrontendController@events');
Route::get('event-detail/{slug}', 'FrontendController@eventDetail')->name('event-detail');


//Shop Route
Route::get('shop/', 'ShopController@shop')->name('shop');
Route::get('shop/shop-detail/{slug}', 'ShopController@shopDetail');
Route::post('shop/add-to-cart/{id}', 'ShopController@addToCart')->name('add-to-cart');
Route::get('shop/view-cart', 'ShopController@getCart')->name('view-cart');
Route::get('shop/empty-cart', 'ShopController@removeCart')->name('empty-cart');
Route::get('shop/remove-item/{rowId}', 'ShopController@removeCartItem')->name('remove-item');
Route::get('shop/update-cart/{rowId}', 'ShopController@updateCart')->name('update-cart');
//Route::get('shop/checkout', 'ShopController@checkout')->name('checkout');
Route::post('shop/Checkout', 'ShopController@postCheckout')->name('postCheckout');
Route::post('shop/postPaymentMethod', 'ShopController@postPaymentMethod')->name('postPaymentMethod');
Route::get('shop/payment', 'ShopController@stripePayment')->name('stripe-payment');
Route::post('payCash', 'ShopController@payCash')->name('payCash');

//Paypal route
Route::get('shop/payMoney', array('as' => 'payMoney','uses' => 'PaypalController@index',));
Route::post('postPaypal', array('as' => 'postPaypal','uses' => 'PaypalController@postPayment',));
Route::get('shop/status', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

//Error page
Route::get('/404', function () {
    return abort(404);
});
