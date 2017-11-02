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

/* Test */
Route::get('student', function () { return view('student.profile');});


/* Guest routes */
Route::get('/', function () { return view('pages.home');});
Route::get('enrollment/options', function () { return view('pages.selection');});
Route::get('login','PagesController@login');
Route::get('registration','PagesController@registration_form');
Route::post('submit_form', 'PagesController@submit_form');
Route::get('registration/email/confirmation/{email}', 'PagesController@confirmation')->name('confirmation');
Route::post('execute_login', 'PagesController@executeLogin');


/* Student routes */
Route::get('account/student/profile/{name}','StudentController@profile');
Route::get('account/student/request/{name}','StudentController@requestedSubjects');
Route::get('subjects/{course}','StudentController@subjectsOffered');
Route::get('schedules/{course}','StudentController@scheduleList');
Route::post('submit_enrollment', 'StudentController@submit_enrollment');
Route::post('cancel_request', 'StudentController@cancel_request');
Route::get('logout', 'PagesController@logout');

/* User routes */
Route::get('user/login','PagesController@user_login');


/* Registrar routes */

/* -> Students */
Route::get('account/registrar/students','AdminController@students');
Route::get('account/registrar/students/{email}','AdminController@student');
Route::post('verify_students', 'AdminController@verify_students');

/* -> Subjects */
Route::get('account/registrar/subjects','AdminController@subjects');
Route::post('store_subject', 'AdminController@store_subject');

/* -> Faculty */
Route::get('account/registrar/faculties','AdminController@faculties');
Route::post('store_faculty', 'AdminController@store_faculty');

/* -> Schedule */
Route::get('account/registrar/schedules','AdminController@schedules');
Route::post('store_schedule', 'AdminController@store_schedule');



/* Coordinator routes */
Route::get('account/coordinator/coordinator','CoordinatorController@coordinator');