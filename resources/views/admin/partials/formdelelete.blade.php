<form action="{{ $route }}" method="POST" onsubmit="return confirm('{{ $message }}')">
    @csrf
    @method('DELETE')
    <input type="submit" value="Elimina" class="btn btn-outline-danger">
</form>
