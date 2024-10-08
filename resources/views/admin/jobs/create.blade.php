@extends('layouts.app')

@section('content')
    <h1>Crea nuovo progetto</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" value="{{ old('title') }}"
                class="form-control @error('title')
                is-invalid
            @enderror" id="title"
                name="title">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category">Categoria</label>
            <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content">Contenuto</label>
            <textarea type="text" class="form-control @error('content')
                is-invalid @enderror" id="content"
                name="content" rows="7"> {{ old('content') }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">

            <label for="tags" class="form-label d-block">Tag</label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($tags as $tag)
                    <input name="tags[]" @if (in_array($tag->id, old('tags', []))) checked @endif value="{{ $tag->id }}"
                        type="checkbox" class="btn-check" id="{{ $tag->id }}" autocomplete="off">
                    <label class="btn btn-outline-dark" for="{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach

            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="path_image">Immagine</label>
            <input class="form-control" type="file" name="path_image" id="path_image">
        </div>
        <div class="mb-3">
            <label for="processing_time">Tempo di realizzazione</label>
            <input type="number" value="{{ old('processing_time') }}"
                class="form-control @error('processing_time')is-invalid @enderror " id="processing_time"
                name="processing_time" placeholder="tempo in settimane">
            @error('processing_time')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-dark" type="submit">Salva</button>


    </form>
@endsection
