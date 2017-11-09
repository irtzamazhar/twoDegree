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

Auth::routes();

//Blog Route
Route::get('/admin/blog', 'BlogController@index')->name('admin/blog');
Route::get('/admin/blog/create', 'BlogController@create')->name('createPost');
Route::post('createBlogPost', 'BlogController@store')->name('createBlogPost');
Route::get('/admin/blog/deletePost/{id}', 'BlogController@destroy')->name('deleteBlog');
Route::get('/admin/blog/editPost/{id}', 'BlogController@edit')->name('editBlogPost');
Route::post('/admin/blog/update/{id}', 'BlogController@update')->name('updateBlogPost');
Route::get('/admin/blog/showPost/{id}', 'BlogController@show')->name('showBlogPost');

//Site Event Route
Route::get('/admin/event', 'SiteEventsController@index')->name('admin/event');
Route::get('/admin/event/create', 'SiteEventsController@create')->name('createEvent');
Route::post('createEvent', 'SiteEventsController@store')->name('createEvent');
Route::get('/admin/event/editEvent/{id}', 'SiteEventsController@edit')->name('editEvent');
Route::post('/admin/event/update/{id}', 'SiteEventsController@update')->name('updateEvent');
Route::get('/admin/event/showEvent/{id}', 'SiteEventsController@show')->name('showEvent');
Route::get('/admin/event/deleteEvent/{id}', 'SiteEventsController@destroy')->name('deleteEvent');

//Contact Route
Route::get('/admin/contact', 'ContactController@index')->name('admin/contact');
Route::get('/admin/contact/delete/{id}', 'ContactController@destroy')->name('deleteContact');
Route::get('/admin/contact/showContact/{id}', 'ContactController@show')->name('showContact');

//Newsletter Route
Route::get('subscribe','NewsletterController@subscribe')->name('subscribe');
Route::get('/admin/newsletter', 'NewsletterController@index')->name('newsletter');

//Pages Route
Route::get('/admin/pages', 'PagesController@index')->name('admin/pages');
Route::get('/admin/pages/create', 'PagesController@create')->name('createPage');
Route::post('createPage', 'PagesController@store')->name('createPage');
Route::get('/admin/pages/deletePage/{id}', 'PagesController@destroy')->name('deletePage');
Route::get('/admin/pages/editPage/{id}', 'PagesController@edit')->name('editPage');
Route::post('/admin/pages/update/{id}', 'PagesController@update')->name('updatePage');
Route::get('/admin/pages/showPage/{id}', 'PagesController@show')->name('showPage');

//Menu Route
Route::get('/admin/menu', 'MenuController@index')->name('admin/menu');
Route::get('/admin/menu/create', 'MenuController@create')->name('createMenu');
Route::post('createMenu', 'MenuController@store')->name('createMenu');
Route::get('/admin/menu/deleteMenu/{id}', 'MenuController@destroy')->name('deleteMenu');
Route::get('/admin/menu/editMenu/{id}', 'MenuController@edit')->name('editMenu');
Route::post('/admin/menu/update/{id}', 'MenuController@update')->name('updateMenu');
Route::get('/admin/menu/showMenu/{id}', 'MenuController@show')->name('showMenu');

//FAQ's Route
Route::get('/admin/faq', 'FaqsController@index')->name('admin/faq');
Route::get('/admin/faq/create', 'FaqsController@create')->name('createFaq');
Route::post('createFaq', 'FaqsController@store')->name('createFaq');
Route::get('/admin/faq/deleteFaq/{id}', 'FaqsController@destroy')->name('deleteFaq');
Route::get('/admin/faq/editFaq/{id}', 'FaqsController@edit')->name('editFaq');
Route::post('/admin/faq/update/{id}', 'FaqsController@update')->name('updateFaq');
Route::get('/admin/faq/showFaq/{id}', 'FaqsController@show')->name('showFaq');

//Home Route
Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/widgets', 'HomeController@widgets')->name('widgets');
Route::get('/admin/table', 'HomeController@table')->name('table');
Route::get('/admin/profile', 'ProfileController@profile')->name('profile');
Route::post('/update/{id}', 'ProfileController@update')->name('update');




//Route::resource('admin/contact', 'ContactController');

// Mailchimp routes
//Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');

//Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);

// frontend routes
Route::get('/', 'FrontendController@index');
Route::get('/app-download', 'FrontendController@app');
Route::get('{page_url}', 'FrontendController@getPage');
//Route::get('/privacy', 'FrontendController@privacy');
//Route::get('/terms', 'FrontendController@terms');
Route::get('/faq', 'FrontendController@faq');
Route::get('contact', 'ContactController@create')->name('contact');
Route::post('createContact', 'ContactController@store')->name('createContact');
Route::get('blog', 'FrontendController@blog');
Route::get('blog-detail/{id}', 'FrontendController@blogDetail')->name('blog-detail');
Route::get('events', 'FrontendController@events');
Route::get('event-detail/{id}', 'FrontendController@eventDetail')->name('event-detail');

//Route::get('footer', 'FrontendController@footer');


// Route::get('/app-download', 'FrontendController@app')->name('app');
// Route::get('/blog', 'FrontendController@blog')->name('blog');
// Route::get('/blog-detail', 'FrontendController@blogDetail')->name('blog-detail');
// Route::get('/privacy', 'FrontendController@privacy')->name('privacy');
// Route::get('/terms', 'FrontendController@terms')->name('terms');
// Route::get('/faq', 'FrontendController@faq')->name('faq');
// Route::get('/contact', 'FrontendController@contact')->name('contact');