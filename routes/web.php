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
Route::get('courses/{course}','PagesController@subjects');
Route::get('login','PagesController@login');
Route::get('registration','PagesController@registration_form');
Route::post('submit_form', 'PagesController@submit_form');
Route::get('registration/email/confirmation/{email}', 'PagesController@confirmation')->name('confirmation');
Route::post('execute_login', 'PagesController@executeLogin');


/* Student routes */
Route::get('account/student/profile/{name}','StudentController@profile');
Route::get('account/student/request/{name}','StudentController@requestedSubjects');
Route::get('account/student/notifications/{name}','StudentController@notifications');
Route::get('account/student/my_schedules/{name}','StudentController@my_schedules');
Route::get('account/student/my_subjects/{name}','StudentController@my_subjects');
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
Route::get('account/registrar/confirmation_list/view_subjects/{email}','AdminController@view_subjects');
Route::post('enroll', 'AdminController@enroll');
Route::post('reject', 'AdminController@reject');
Route::post('verify_students', 'AdminController@verify_students');
Route::get('unenroll','AdminController@unenroll');

/* -> Subjects */
Route::get('account/registrar/subjects','AdminController@subjects');
Route::post('store_subject', 'AdminController@store_subject');
Route::post('edit_subject', 'AdminController@edit_subject');
Route::post('remove_subject', 'AdminController@remove_subject');

/* -> Faculty */
Route::get('account/registrar/faculties','AdminController@faculties');
Route::get('account/registrar/users','AdminController@users');
Route::get('account/registrar/faculties/onremove','AdminController@onremove_fac');
Route::post('remove_faculty','AdminController@remove_faculty');
Route::post('remove_user','AdminController@remove_user');
Route::post('store_faculty', 'AdminController@store_faculty');
Route::post('store_user', 'AdminController@store_user');
Route::post('update_semester', 'AdminController@update_semester');

/* -> Schedule */
Route::get('account/registrar/schedules','AdminController@schedules');
Route::post('store_schedule', 'AdminController@store_schedule');
Route::post('edit_schedule', 'AdminController@edit_schedule');
Route::post('remove_schedule', 'AdminController@remove_schedule');
/* Coordinator routes */
Route::get('account/coordinator/coordinator','CoordinatorController@coordinator');
Route::get('account/coordinator/request/{email}/{notification_id}','CoordinatorController@evaluation');
Route::get('account/coordinator/student/{email}','CoordinatorController@student_prof');
Route::post('reject_request', 'CoordinatorController@evaluated');