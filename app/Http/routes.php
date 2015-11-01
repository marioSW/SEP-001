<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','Auth\AuthController@getLogin');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function () {
// Admin routes...
    Route::group(['middleware'=>'admin'],function(){
        Route::group(['namespace' => 'Admin'], function() {
            Route::get('admin/dashboard', 'AdminController@getDashboard');
            Route::post('admin/dashboard', 'AdminController@getDashboard');

            Route::get('admin/setusers', 'AdminController@getUsers');
            Route::post('admin/setusers', 'AdminController@setUser');

            Route::get('admin/add_crime_list', 'AdminController@addCrimeList');
            Route::post('admin/add_crime_list', 'AdminController@setCrimeList');

            //Sending email
            Route::get('admin/admin_send_email', 'AdminController@get_view_email');
            Route::post('admin/admin_send', 'AdminController@set_view_email');



        });
    });

// DEO routes
    Route::group(['middleware'=>'deo'],function() {
        Route::group(['namespace' => 'Deo'], function () {
            Route::get('deo/dashboard', 'DeoController@create');
            Route::get('deo/myfiles/','DeoController@viewFiles');

            Route::get('deo/myfiles/{id}','DeoController@openCaseFile');
            Route::post('deo/myfiles/complainer', 'DeoController@searchForm');

            Route::get('deo/add/complainer','DeoController@addComplainer');
        });
        Route::group(['namespace'=>'CaseFile'],function(){
            //Arosha
           // Route::get('deo/test', 'CaseFileController@complainer_insert_combo');
          //  Route::post('deo/test', 'CaseFileController@complainer_insert');
         //   Route::get('deo/test1', 'CaseFileController@testing');
        });

        Route::get('complainer/create','complainercontroller@create');
        Route::post('complainer/create','complainercontroller@complainer_insert');

        Route::get('criminal/appearance','criminalcontroller@setCriminalLook');
        Route::post('criminal/appearance','criminalcontroller@addCriminalLook');
    });

    //Route::resource('criminal','criminalcontroller');


    //Route::resource('complainer','complainercontroller');



    Route::group(['middleware'=>'oic'],function() {
        Route::group(['namespace'=>'OIC'],function(){
					//Gayathri
		    Route::get('oic/dashboard', 'OICController@getDashboard');
		    Route::get('oic/casefile_search', 'OICController@getSearchCaseFile');





            Route::get('oic/pending_case_files', 'OICController@pendingCasefiles');
            Route::get('oic/update_status/{file_no}', 'OICController@edit');
            Route::post('oic/update_status','OICController@update');




			//Ashika
		
		    Route::get('oic/person','OICcontroller@persontable');
		
		    Route::get('oic/crime','OICcontroller@crimetable');
		
		    Route::get('oic/gcr','OICcontroller@gcrtable');
        });
        // OIC routes
        Route::get('oic/makecriminal','criminalcontroller@index');
        Route::post('oic/makecriminal','criminalcontroller@setCriminal');

        Route::get('oic/assignOfficers','policeOfficerContoller@assignCasesIndex');
        Route::post('oic/assignOfficers','policeOfficerContoller@assignCasesCreate');

        Route::get('oic/CrimeSummary','gcrController@index');
        Route::post('oic/CrimeFullView','gcrController@view');
    });
});