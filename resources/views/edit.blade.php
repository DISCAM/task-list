
@extends('layouts.layouts')

@section('title', 'Edit task')

@section('styles')
    <style>
        .error_style{
            color: red;
            font-size: 0.8rem;
        }

    </style>
@endsection

@section('content')

    @if($errors != '[]')
        {{ $errors }}
    @endif

    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
            </label>
            <input
                value="{{ $task->title }}"
                type="text"
                name="title"
                id="title" />
            @error('title')
            <p class="error_style"> brak danych dla pola title </p>
            @enderror
        </div>
        <div>
            <label for="description">
                Description
            </label>
            <textarea
                id="description"
                name="description"
                rows="5"
                placeholder="wprowadź tekst"
            >
                {{ $task->description }}
            </textarea>
            @error('description')
            <p class="error_style"> brak danych dla pola description </p>
            @enderror
        </div>
        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea
                id="long_description"
                name="long_description"
                rows="10"
                placeholder="wprowadź tekst"
            >
                {{ $task->long_description }}
            </textarea>
            @error('long_description')
            <p class="error_style"> brak danych dla pola long description </p>
            @enderror
        </div>
        <button type="submit">Zapisz </button>
    </form>

@endsection

