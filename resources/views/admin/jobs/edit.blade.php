@extends('layouts.app')

@section('content')
    <h1>Modifica {{ $job->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" value="{{ old('title', $job->title) }}"
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
                    <option value="{{ $category->id }}" @if (old('category_id', $job->category?->id) == $category->id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content">Contenuto</label>
            <textarea type="text" class="form-control @error('content')
                is-invalid @enderror" id="content"
                name="content" rows="7"> {{ old('content', $job->content) }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="processing_time">Tempo di realizzazione</label>
            <input type="number" value="{{ old('processing_time', $job->processing_time) }}"
                class="form-control @error('processing_time')
                is-invalid @enderror " id="processing_time"
                name="processing_time" placeholder="tempo in settimane">
            @error('processing_time')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Salva</button>


    </form>
@endsection
