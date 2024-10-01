@extends('layouts.app')

@section('content')
    <div class="comtainer-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1>Portfolio lavori</h1>
            </div>
            <div class="col-12 d-flex justify-content-center ">
                <h3>Ultimo lavoro</h3>
            </div>
            <div class="col-9 m-auto p-3">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Immagine</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Tempo di realizzazione</th>
                            <th scope="col">Contenuto</th>
                            <th scope="col">Tags</th>
                            <th scope="col">ultima modifica</th>
                            <th scope="col">Azioni</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $jobs->id }}</td>
                            <td>
                                <img class=" img-thumbnail w-25" src="{{ asset('storage/' . $jobs->path_image) }}"
                                    alt="{{ $jobs->image_original_name }}" onerror="this.src='/img/placeholder.jpg'">
                            </td>
                            <td>{{ $jobs->title }}</td>
                            <td><span class="badge text-bg-dark">{{ $jobs->category->name }}</span></td>
                            <td>{{ $jobs->processing_time }} Settimane</td>
                            <td>{{ $jobs->content }}</td>
                            <td class=" table-primary">
                                @forelse ($jobs->tags as $tag)
                                    <span class="badge text-bg-dark ">{{ $tag->name }}
                                    </span>
                                @empty
                                    <span class="badge text-bg-dark ">-
                                    </span>
                                @endforelse
                            <td>{{ $jobs->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('admin.jobs.show', $jobs->id) }}">Vai</a>
                            </td>

                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-9 m-auto">
                <h4>Nell' archivio ci sono {{ $count }} lavori</h4>
            </div>

        </div>
    </div>
@endsection
