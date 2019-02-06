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

   Route::get('/','WelcomeController@welcome')->name('welcome');
   // Route::get('/feed','Article\ArticleController@welcome')->name('welcome');

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
 

Route::get('/terms',function(){
    return view('Terms.terms');
})->name('terms');

Route::get('/privacy',function(){
    return view('Terms.privacy');
})->name('privacy');
Auth::routes();

Route::middleware('optimizeImages')->group(function () {
    // all images will be optimized automatically
  Route::post('/get-me-in', 'AfterSignup\AfterSignupController@createProfile')->name('get-me-in');
  Route::post('/update-propic', 'ProfileController@updateProfilePic')->name('update-propic');
Route::post('/update-profile', 'ProfileController@updateProfile')->name('update-profile');
Route::resource('article','Article\ArticleController');
Route::resource('theory','Theory\TheoryController');
Route::post('NewProfile',function(){
    $view = view('AfterSignup.createprofile')->render();
    return response()->json(['view'=>$view]);
})->name('NewProfile');
Route::post('/multi-image/{id}','Article\ArticleController@articleImage')->name('multi-image');
Route::post('/fbn.studio/store','Studio\StudioController@store')->name('storeContent');
});

Route::group([ 'middleware' => 'auth' ], function () {
    Route::get('/feed', 'FeedController@index')->name('feed');
    Route::get('/home', 'FeedController@index')->name('home');
    //Route::get('/','FeedController@index')->name('feed');
//Route::post('/get-me-in', 'AfterSignup\AfterSignupController@createProfile')->name('get-me-in');

Route::get('/write','Article\ArticleController@create' )->name('write');
//write theory
Route::get('/write-theory','Article\ArticleController@createTheory' )->name('write-theory');

//store theory
Route::post('/store-theory','Article\ArticleController@storeTheory')->name('store-theory');

// Delete theory
//Route::post('/delete-theory/{$id}','Article\ArticleController@delTheory')->name('delete-theory');

//theories of user
Route::get('/theories-user/{$user}','Article\ArticleController@sameUserTheories')->name('theories-user');
// For article controlling
//Route::resource('article','Article\ArticleController');
Route::resource('profile','ProfileController');
Route::get('/choosegenre/{slug?}', 'AfterSignup\AfterSignupController@chooseGenre')->name('choosegenre');
Route::get('/settings', 'ProfileController@settings')->name('settings');
Route::post('/store-genre', 'AfterSignup\AfterSignupController@storeGenre')->name('store-genre');
// update profile pic
//Route::post('/update-propic', 'ProfileController@updateProfilePic')->name('update-propic');
//Route::post('/update-profile', 'ProfileController@updateProfile')->name('update-profile');

Route::post('rem-genre', 'AfterSignup\AfterSignupController@remGenre')->name('rem-genre');
//Route::post('NewProfile',function(){
   // $view = view('AfterSignup.createprofile')->render();
   // return response()->json(['view'=>$view]);
//})->name('NewProfile');

Route::get('/create-profile',function(){
    return view('AfterSignup.createprofile');
})->name('create-profile');

// for following
Route::post('/follow','FollowController@follow')->name('follow');
Route::post('/unfollow','FollowController@unfollow')->name('unfollow');
Route::post('/like','FollowController@like')->name('like');
Route::post('/unlike','FollowController@unlike')->name('unlike');
Route::post('/bookmark','FollowController@bookmark')->name('bookmark');
Route::get('/show-bookmark','FollowController@showBookmark')->name('show-bookmark');
Route::post('/unmark','FollowController@unmark')->name('unmark');

// to save article
Route::post('/save','Article\ArticleController@save' )->name('save');

// to complete unfinished article 
Route::post('complete-article','Article\ArticleController@completeArticle')->name('complete-article');

// multi images for article
//Route::post('/multi-image/{id}','Article\ArticleController@articleImage')->name('multi-image');

Route::get('/view-edit/{article}','Article\ArticleController@nonRealtimeEdit')->name('view-edit');
Route::post('/comment','Article\ArticleController@comment')->name('comment');
Route::get('/notifications','NotificationController@notifications')->name('notifications');
Route::post('/markRead','NotificationController@markRead')->name('markRead');
Route::get('/all-notifications','NotificationController@allNotifications')->name('all-notifications');
Route::get('/profile/{user}/{slug}','ProfileController@show')->name('profile');
Route::get('/user-categories/{user}/{slug}','ProfileController@userCategories')->name('user-categories');
// To show article
Route::get('/show-article/{article}/{slug}','Article\ArticleController@show')->name('show-article');

// To show article external link
Route::get('/story/{id}/{slug}','Article\ArticleController@showExt')->name('showExt');
// to show theory
Route::get('/show-theory/{theory}/{slug}','Article\ArticleController@showTheory')->name('show-theory');

// curated story
Route::get('curated-story','FeedController@followingStory')->name('curated-story');
// show people from same place
Route::get('follow-people','FeedController@followPeople')->name('follow-people');
// see all story choices
Route::get('all-story-choices','FeedController@all_choices')->name('all-story-choices');
// to see following people 
Route::get('follows/{user}/{slug}','ProfileController@seeFollowing')->name('follows');
});




// stories of a genre
Route::get('all-stories-in/{genre}','Article\ArticleController@sameGenreStories')->name('stories-genre');
// stories of a user
Route::get('all-stories-of/{user}','Article\ArticleController@sameUserStories')->name('stories-user');
//search
Route::get('/search','SearchController@search')->name('search');
Route::get('/search-item','SearchController@searchSuggestion')->name('search-item');
Route::get('/forgot-password',function(){
    return view('User.forgotpassword');
})->name('forgot');    
Route::post('/update-pass','ProfileController@forgotPassword')->name('update-pass');

// aerepad routes

Route::get('/get-aerepad','AerePad\AerePadController@getstarted')->name('getaerepad');
Route::get('/aerepad/login','Auth\AerePadLoginController@showLoginForm')->name('aerepadloginform'); 
Route::post('/aerepad/login','Auth\AerePadLoginController@login')->name('aerepadlogin'); 
Route::get('/aerepad/register','Auth\AerePadRegisterController@showRegistrationForm')->name('aerepadregistrationform');  
Route::post('aerepad/register','Auth\AerePadRegisterController@register')->name('aerepadregister'); 
Route::get('/aerepad/desk', 'AerePad\AerePadController@userDesk')->name('userdesk');
Route::get('/aerepad/newsfeed', 'AerePad\AerePadController@newsFeed')->name('newsfeed');
Route::post('aerepad/store','AerePad\AerePadController@storeNews')->name('storeNews'); 


// studio interface
Route::get('/workstation/fbn.studio/','Auth\StudioLoginController@showLoginForm')->name('studioLoginForm');
Route::post('/workstation/fbn.studio/','Auth\StudioLoginController@login')->name('studiologin');
Route::get('/workstation/fbn.studio/dashboard/','Studio\StudioController@dashboard')->name('studio-dashboard');
//Route::post('/fbn.studio/store','Studio\StudioController@store')->name('storeContent');
Route::get('/fluidbN-studio-story/{StudioStories}/{slug}','Studio\StudioController@show')->name('studio-story');
// like studio story
Route::post('/likeFbnStory','FollowController@likeFbnStory')->name('likeFbnStory');
// unlike studio story
Route::post('/unlikeFbnStory','FollowController@unlikeFbnStory')->name('unlikeFbnStory');
// bookmark
Route::post('/urlFbnStoryBookmark','FollowController@urlFbnStoryBookmark')->name('urlFbnStoryBookmark');
// unmark
Route::post('/urlFbnStoryUnmark','FollowController@urlFbnStoryUnmark')->name('urlFbnStoryUnmark');

// to report theory
Route::post('report-theory','Theory\TheoryController@report')->name('report-th');
// to report story
Route::post('report-story','Article\ArticleController@report')->name('report-st');