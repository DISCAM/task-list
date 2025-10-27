<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        //'tasks' => \App\Models\Task::all(),
        //'tasks' => \App\Models\Task::latest()->where('completed',true)->get(),
        'tasks' => Task::latest()->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/create' , function (){
    return view('create');
})->name('tasks.create');

//Route::view('/tasks/create' , 'create');

Route::get('/tasks/{id}' , function ($id){
    return view('show', [
        'task' => Task::findOrFail($id)]);
})->name('tasks.shown');

Route::get('/hello', function () {
    return "Hello all";
})->name('hello');

Route::get('/greet/{name}', function ($name){
   return 'Witam cie czule ' . $name;
});

Route::get('xxx', function (){
    return redirect()->route('hello');
});

Route::post('/tasks', function (Request $request){
    //dd($request->all());

    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.shown', ['id' => $task->id])
        ->with('success', 'udało się dodać rekord' );


})->name('tasks.store');

Route::fallback(function (){
   return 'Still got somewhere';
});


















