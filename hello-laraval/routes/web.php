<?php

use App\Models\Task;

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello/{locale?}', function (Request $request, $locale = 'en') {
  // $a = $request->input('locale');
  // echo "aaa:: $locale";
  // App::setLocale($locale);
  // $tasks = Task::get();
  $tasks = Task::where('user_id', $request -> user() -> id) -> get();

  return view('hello', ['tasks' => $tasks]);
});
Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
      return redirect('/hello')
          ->withInput()
          ->withErrors($validator);
  }

  // $task = new Task;
  // $task -> name = $request -> name;
  // $task -> user_id = $request -> user() -> id;
  // $task -> save();

  $request->user()->tasks()->create([
      'name' => $request->name,
  ]);

  return redirect('/hello');
});
Route::delete('/task/{task}', function (Task $task) {
  $aa = $task -> delete();
  // $task->delete();
  return redirect('/hello');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
