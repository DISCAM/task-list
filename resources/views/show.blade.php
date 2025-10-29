@extends('layouts.layouts')

@section('title' , "to jest zadanie  $task->title ")


@section('content')

    --------------------------------------------------------------------------
    <p> zadanie opis : {{ $task->description }}  </p>
    <p> zadanie zakończone : {{ $task->completed }}  </p>
    <p> zadanie utworzone : {{ $task->created_at }}  </p>
    <p> zadanie zmodyfikowane : {{ $task->updated_at }}  </p>
    @if($task->long_description)
        <p> opis szczegółowy : {{ $task->long_description }} </p>
    @else
        <p> brak opisu szczegółowego </p>
    @endif
    --------------------------------------------------------------------------

    <p>
        <a href="{{ route('tasks.index') }}">Powrót</a>
    </p>

    <div>
        <form method="POST" action="{{ route('tasks.destroy' , ['task' => $task->id]) }}">
            @csrf
            @method('DELETE')

         <button type="submit" >usun </button>


        </form>
    </div>


@endsection




