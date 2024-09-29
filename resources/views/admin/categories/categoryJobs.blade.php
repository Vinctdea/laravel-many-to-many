@extends('layouts.app')

@section('content')
    <h1>Elenco jobs per categoria</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <ul class="list-group m-3">
            @foreach ($category->jobs as $job)
                <li class="list-group-item d-flex justify-content-between">
                    <span> {{ $job->title }}</span>
                    <a class="btn btn-info" href="{{ route('admin.jobs.show', $job) }}">info</a>
                </li>
            @endforeach

        </ul>
    @endforeach
@endsection
