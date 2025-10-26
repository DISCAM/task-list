<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        //'tasks' => \App\Models\Task::all(),
        //'tasks' => \App\Models\Task::latest()->where('completed',true)->get(),
        'tasks' => \App\Models\Task::latest()->get(),
    ]);
})->name('tasks.index');


Route::get('/tasks/{id}' , function ($id){
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.shown');


Route::get('/hello', function () {
    return "Hello all fuckers ";
})->name('hello');

Route::get('/greet/{name}', function ($name){
   return 'Witam cie ciule ' . $name;
});

Route::get('xxx', function (){
    return redirect()->route('hello');
});

Route::fallback(function (){
   return 'Still got somewhere';
});


















