@extends('layouts.layouts')

@section('title', 'Blade Template')

{{--
<div>
    @if(count($tasks))
        <h3>Wypisujemy wszystkie zadania </h3>
        @foreach($tasks as $task)
            --------------------------------------------------------------------------
            <p> zadanie id : {{ $task->id }}  </p>
            <p> zadanie tytuł : {{ $task->title }}  </p>
            <p> zadanie opis : {{ $task->description }}  </p>
            <p> zadanie zakończone : {{ $task->completed }}  </p>
            <p> zadanie utworzone : {{ $task->created_at }}  </p>
            <p> zadanie zmodyfikowane  : {{ $task->updated_at }}  </p>

        @endforeach
    @else
        <div>There are no tasks</div>
    @endif
</div>
--}}

@section('content')
    @forelse($tasks as $task)
        <p><a href="{{ route('tasks.shown', ['id' => $task->id]) }}">zadanie tytuł : {{ $task->title }}</a></p>
    @empty
        <p>Brak taska</p>
    @endforelse
@endsection

