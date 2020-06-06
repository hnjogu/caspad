<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



// Website Route
Route::get('/', 'WebController@index');
Route::get('/transcription', 'WebController@transcription');
Route::get('/about', 'WebController@about');
Route::get('/contact', 'WebController@contact');
Route::post('/sendemail/send', 'WebController@send');
Route::get('/tos', 'WebController@tos');
Route::get('/pp', 'WebController@pp');
Route::get('/cs', 'WebController@cs');

Auth::routes();
Route::get('users/fetch2', 'countryController@fetch2')->name('users.fetch2');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/approval', 'HomeController@approval')->name('approval');

	Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');

	                // Dashboard Route
		Route::get('/dashboard', 'AdminController@index');
		    // profile Update
		Route::get('/viewprofile/{id}', 'profileController@viewprofile')->name('viewprofile');

		// projects route
		Route::get('/getprojectsindex', 'ProjectsController@getprojectsindex')->name('getprojectsindex');
		Route::get('/completed-projects', 'ProjectsController@completedProjects')->name('projects.completed');
		Route::get('/promotions', 'ProjectsController@promotions')->name('projects.promotion');
        Route::resource('/projects', 'ProjectsController');

        // download pdf file 

        Route::get('/clientpdf/{id}', 'ProjectsController@clientpdf')->name('clientpdf');

        //Route::get('/pdfnaturalforest/{treeplant_id}', 'StaffController@pdfnaturalforest')->name('pdfnaturalforest');


		                //change password blade
	    Route::get('/changePassword','UserController@showChangePasswordForm')->name('changePassword');
	    Route::post('/changePassword','UserController@changePassword')->name('changePassword');

	         // your routes for Permissions start here
	    Route::get('/showpermissions', 'PermissionsController@showpermissions')->name('showpermissions');
	    Route::get('/getpermissions', 'PermissionsController@getpermissions')->name('getpermissions');
	    Route::post('/getpermissions','PermissionsController@createpermissions')->name('createpermissions');
	    Route::get('/geteditpermissions/{id}', 'PermissionsController@geteditpermissions')->name('getpermissions');
	    Route::post('/geteditpermissions/{id}','PermissionsController@editpermissions')->name('editpermissions');
	    Route::get('/showpermissions/{id}', 'PermissionsController@destroy')->name('destroy');
	        // user and role routes
	    Route::get('users/fetch', 'UserController@fetch')->name('users.fetch');
	    Route::post('users/activeDeactive', 'UserController@activeDeactive')->name('users.activeDeactive');
	    Route::post('users/approveDisapprove', 'UserController@approveDisapprove')->name('users.approveDisapprove');
	    Route::resource('roles','RoleController');
		Route::resource('users','UserController');
			// Find work routes
        Route::get('/findwork', 'FindworkController@index')->name('findwork.index');
        Route::get('/findwork/grader', 'FindworkController@graderIndex');
        Route::get('/findwork/graded-jobs', 'FindworkController@gradedJobs');
        Route::get('/findwork/{id}/unclaim', 'FindworkController@unclaim')->name('findwork.unclaim');
        Route::get('/workspace/{id}', 'FindworkController@workspace')->name('workspace.index');
        Route::get('/freelancer-completed-projects', 'FindworkController@completedProjects');
        Route::get('/metrics', 'FindworkController@metrics');
        Route::get('/metrics/{id}/view', 'FindworkController@viewMetrics');
        Route::get('/freelancer-earnings', 'FindworkController@freelancerEarnings');
        Route::get('/grader-earnings', 'FindworkController@graderEarnings');

		Route::get('/findwork', 'FindworkController@index')->name('findwork.index');
		Route::get('/workspace', 'FindworkController@workspace')->name('workspace.index');

	});
	
	// Payments
	Route::get('payment/{id}/pay', 'PaymentController@pay');

});
Route::get('logout', 'Auth\LoginController@logout', function () {
		    return abort(404);
	});