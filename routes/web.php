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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/', function () {
    return view('auth.register');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-tasks', 'HomeController@addTasks')->name('home.add_tasks');
Route::post('/home', 'HomeController@createTasks')->name('home.create_tasks');
Route::get('/delete/{id}', 'HomeController@deleteTask')->name('home.delete_task');
Route::get('/update/{id}', 'HomeController@viewTask')->name('home.view_task');
Route::post('/update/{id}', 'HomeController@updateTask')->name('home.update_task');
// adding project

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-project', 'HomeController@addProject')->name('home.add_project');
Route::post('/projects', 'HomeController@createProjects')->name('home.create_projects');
Route::get('/projects', 'HomeController@allProjects')->name('home.projects');
Route::get('/project/{id}', 'HomeController@deleteProject')->name('home.delete_project');
Route::get('/projects/{id}', 'HomeController@viewProject')->name('home.view_project');
Route::post('/project/{id}', 'HomeController@updateProject')->name('home.update_project');
Route::get('/project-detail/{id}', 'HomeController@detailsProject')->name('home.view_project_details');
