 @extends('layouts.app')

 @section('content')
     @if (session('message'))
         <div class="alert alert-success">{{ session('message') }}</div>
     @endif

     <h1>dettagli lavoro</h1>
     <div class="container-fluid m-4">
         <ul>
             <li><strong>Titolo:</strong> {{ $job->title }}</li>
             @if ($job->tags)
                 <li><strong>Tags:</strong>
                     @foreach ($job->tags as $tag)
                         <span class="badge text-bg-primary mx-1">{{ $tag->name }}</span>
                     @endforeach
                 </li>
             @endif
             <li><strong>Categoria:</strong> {{ $job->category ? $job->category->name : 'Nessuna categoria' }}</li>
             <li><strong>Descrizione:</strong> {{ $job->content }}</li>
             <li><strong>Tempo di realizzazione:</strong> {{ $job->processing_time }} settimane</li>
         </ul>

     </div>
     <div class="container-fluid d-flex justify-content-center">
         <a class="btn btn-primary" href="{{ route('admin.jobs.index') }}">Torna all'elenco</a>
         <a href="{{ route('admin.jobs.edit', ['job' => $job->id]) }}"
             class="btn btn-warning align-content-around mx-3">Modifica</a>
         @include('admin.partials.formdelelete', [
             'route' => route('admin.jobs.destroy', $job),
             'message' => "confermi di voler eliminare $job->title ?",
         ])
         </form>
     </div>
 @endsection
