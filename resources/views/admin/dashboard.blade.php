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
            <div class="col-12 ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tempo di realizzazione</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $jobs->id }}</td>
                            <td>{{ $jobs->title }}</td>
                            <td>{{ $jobs->processing_time }} Settimane</td>
                            <td>{{ $jobs->content }}</td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('admin.jobs.show', $jobs->id) }}">Vai</a>
                            </td>

                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
