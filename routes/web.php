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
Route::get('/medical', 'WebController@medical');
Route::get('/research', 'WebController@research');
Route::get('/business', 'WebController@business');
Route::get('/academic', 'WebController@academic');
Route::get('/legal', 'WebController@legal');
Route::get('/podcast', 'WebController@podcast');
Route::get('/faqs', 'WebController@faqs');


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
	    Route::get('/geteditprofile/{id}', 'profileController@geteditprofile')->name('geteditprofile');
	    Route::post('/geteditprofile/{id}','profileController@updateprofile')->name('updateprofile');
	    Route::get('users/fetch3', 'profileController@fetch3')->name('users.fetch3');

		// projects route
		Route::get('/getprojectsindex', 'ProjectsController@getprojectsindex')->name('getprojectsindex');
		Route::get('/completed-projects', 'ProjectsController@completedProjects')->name('projects.completed');
		Route::get('/promotions', 'ProjectsController@promotions')->name('projects.promotion');
	    Route::resource('/projects', 'ProjectsController');
	    Route::get('/rate/{id}', 'ProjectsController@rate')->name('rate');
	    Route::post('/rate/store/{id}', 'ProjectsController@storeRate')->name('rate.store');
	    Route::get('/rateddJobs', 'AdminController@rateddJobs')->name('rateddJobs');
			// Pending Projects
	    Route::get('/freelancer/pending-project', 'FindworkController@freelancerPending')->name('freelancer.pending');
	    Route::get('/freelancer/resume-project', 'FindworkController@freelancerResume')->name('freelancer.resume');
	    Route::get('/grader/pending-project', 'FindworkController@graderPending')->name('grader.pending');
			Route::get('/grader/resume-project', 'FindworkController@graderResume')->name('grader.resume');

			Route::get('/completed-jobs', 'AdminController@completedProjects')->name('grader.resume');
			Route::get('/posted-jobs', 'AdminController@postedJobs');


			// Accounts Panel
	    Route::get('/paid-projects', 'AccountsController@paidProjects')->name('projects.paid');
	    Route::get('/client/paid-projects', 'AccountsController@clientPaidProjects')->name('projects.clientPaid');


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
        Route::get('/findwork/grader', 'FindworkController@graderIndex')->name('grader.index');
        Route::get('/findwork/graded-jobs', 'FindworkController@gradedJobs');
        Route::get('/findwork/{id}/unclaim', 'FindworkController@unclaim')->name('findwork.unclaim');
        Route::get('/workspace/{id}', 'FindworkController@workspace')->name('workspace.index');
        Route::get('/graderWorkspace/{id}', 'FindworkController@graderWorkspace')->name('workspace.index');
        Route::get('/freelancer-completed-projects', 'FindworkController@completedProjects');
        Route::get('/metrics', 'FindworkController@metrics');
        Route::get('/metrics/{id}/view', 'FindworkController@viewMetrics');
        Route::get('/freelancer-earnings', 'FindworkController@freelancerEarnings');
        Route::get('/grader-earnings', 'FindworkController@graderEarnings');
		Route::get('/workspace', 'FindworkController@workspace')->name('workspace.index');
		Route::post('/workspace/store/{id}', 'FindworkController@workspaceStore')->name('workspace.store');
		Route::post('/grader-workspace/store/{id}', 'FindworkController@graderworkspaceStore')->name('graderworkspace.store');

				// Manage Account route
				Route::get('/accounts', 'AccountsController@index')->name('accounts');

	});

	// Payments
	Route::get('payment/{id}/pay', 'PaymentController@pay');
	// Route::get('paymentsuccess/{id}', 'PaymentController@payment_success')->name('paymentsuccess');
	Route::get('/paymentsuccess', 'PaymentController@payment_success')->name('paymentsuccess');
	Route::get('paymenterror', 'PaymentController@payment_error')->name('paymenterror');

});
Route::get('logout', 'Auth\LoginController@logout', function () {
		    return abort(404);
	});
