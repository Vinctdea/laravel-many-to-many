@extends('layouts.app')

@section('content')
    <div class="container-fluid m-auto">

        <h1>Elenco categorie</h1>

        <div class="col-6">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if (session('delete'))
                <div class="alert alert-success">{{ session('delete') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <table class="table mt-5">

                        <form class="d-flex justify-content-between mt-4" action="{{ route('admin.categories.store') }}"
                            method="POST">
                            @csrf
                            <input placeholder="Aggiungi categoria" type="text" name="name"
                                class="form-controll me-3">
                            <button class="btn btn-primary" type="submit">Aggiungi</button>
                        </form>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                                            id="form-edit-{{ $category->id }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{ $category->name }}">

                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" type="submit"
                                            onclick="submitEdit({{ $category->id }})">Aggiorna</button>
                                    </td>
                                    <td>
                                        @include('admin.partials.formdelelete', [
                                            'route' => route('admin.categories.destroy', $category),
                                            'message' => "confermi di voler eliminare  $category->name",
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function submitEdit(id) {
            const form = document.getElementById(`form-edit-${id}`)
            form.submit();
        }
    </script>
@endsection
