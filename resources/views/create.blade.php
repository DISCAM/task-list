

@extends('layouts.layouts')

@section('title', 'Add task')

@section('styles')
    <style>
        .error_style{
            color: red;
            font-size: 0.8rem;
        }

    </style>
@endsection


@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input
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
            ></textarea>
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
            ></textarea>
            @error('long_description')
            <p class="error_style"> brak danych dla pola long description </p>
            @enderror
        </div>
        <button type="submit">Zapisz</button>
    </form>

@endsection
