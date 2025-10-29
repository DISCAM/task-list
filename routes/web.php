<?php


use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;

use App\Models\Task;

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [

        'tasks' => Task::query()->latest()->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/create' , function (){
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{task}/edit' , function (Task $task){
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

//Route::view('/tasks/create' , 'create');

Route::get('/tasks/{task}' , function (Task $task){
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::get('/hello', function () {
    return "Hello all";
})->name('hello');

Route::get('/greet/{name}', function ($name){
   return 'Witam cie czule ' . $name;
});

Route::get('xxx', function (){
    return redirect()->route('hello');
});

Route::post('/tasks', function (TaskRequest $request){

    $task = Task::query()->create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'udało się dodać rekord' );
    })->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task , TaskRequest $request){
   $task->update($request->validated());
   return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'udało się zaktualizować rekord' );
    })->name('tasks.update');

Route::delete('tasks/{task}', function (Task $task){
   $task->delete();
   return redirect()->route('tasks.index')
       ->with('success', 'usunięto z sukcesem ');
})->name('tasks.destroy');

Route::fallback(function (){
   return 'Still got somewhere';
});


















