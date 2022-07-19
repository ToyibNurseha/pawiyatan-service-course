<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('mentors', 'MentorController@index');
Route::get('mentors/{id}', 'MentorController@show');
Route::post('mentors', 'MentorController@create');
Route::put('mentors/{id}', 'MentorController@update');
Route::delete('mentors/{id}', 'MentorController@destroy');

Route::get('category', 'CategoryController@index');
Route::get('category/{id}', 'CategoryController@show');
Route::post('category', 'CategoryController@create');
Route::put('category/{id}', 'CategoryController@update');
Route::delete('category/{id}', 'CategoryController@destroy');

Route::get('sub_category', 'SubCategoryController@index');
Route::get('sub_category/{id}', 'SubCategoryController@show');
Route::post('sub_category', 'SubCategoryController@create');
Route::put('sub_category/{id}', 'SubCategoryController@update');
Route::delete('sub_category/{id}', 'SubCategoryController@destroy');

Route::post('courses', 'CourseController@create');
Route::put('courses/{id}', 'CourseController@update');
Route::get('courses/{id}', 'CourseController@show');
Route::get('courses', 'CourseController@index');
Route::delete('courses/{id}', 'CourseController@destroy');

Route::post('chapters', 'ChapterController@create');
Route::put('chapters/{id}', 'ChapterController@update');
Route::get('chapters', 'ChapterController@index');
Route::get('chapters/{id}', 'ChapterController@show');
Route::delete('chapters/{id}', 'ChapterController@destroy');

Route::post('lessons', 'LessonController@create');
Route::put('lessons/{id}', 'LessonController@update');
Route::get('lessons', 'LessonController@index');
Route::get('lessons/{id}', 'LessonController@show');
Route::delete('lessons/{id}', 'LessonController@destroy');

Route::post('image-courses', 'ImageCourseController@create');
Route::delete('image-courses/{id}', 'ImageCourseController@destroy');

Route::post('my-courses', 'MyCourseController@create');
Route::get('my-courses', 'MyCourseController@index');
Route::post('my-courses/premium', 'MyCourseController@createPremiumAccess');

Route::post('reviews', 'ReviewController@create');
Route::put('reviews/{id}', 'ReviewController@update');
Route::delete('reviews/{id}', 'ReviewController@destroy');
