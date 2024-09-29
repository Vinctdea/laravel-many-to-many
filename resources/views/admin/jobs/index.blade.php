@extends('layouts.app')

@section('content')
    <h1>Elenco di tutti i lavori</h1>

    @if (session('delete'))
        <div class="alert alert-success">{{ session('delete') }}</div>
    @endif
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descizione</th>
                <th scope="col">Tempo di lavorazione WEEK</th>
                <th scope="col">Categoria</th>
                <th scope="col">Data di inserimento</th>
                <th scope="col">azioni</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td class=" table-primary ">{{ $job->id }}</td>
                    <td class=" table-dark ">{{ $job->title }}</td>
                    <td class=" table-primary ">{{ $job->content }}</td>
                    <td class=" table-dark ">{{ $job->processing_time }}</td>
                    <td class=" table-secondary"> <span class="badge text-bg-primary ">
                            {{ $job->category ? $job->category->name : 'Nessuna categoria' }} </span>
                    </td>
                    <td class=" table-primary ">{{ $job->created_at->format('d / m / Y') }}</td>
                    <td class=" table-dark ">
                        <a href="{{ route('admin.jobs.show', ['job' => $job->id]) }}"
                            class="btn btn-outline-primary ">Dettagli</a>
                        <a href="{{ route('admin.jobs.edit', ['job' => $job->id]) }}"
                            class="btn btn-outline-warning align-content-around">Modifica</a>
                        @include('admin.partials.formdelelete', [
                            'route' => route('admin.jobs.destroy', $job),
                            'message' => "confermi di voler eliminare $job->title ?",
                        ])
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $jobs->links() }}

    </div>
@endsection
