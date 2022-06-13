@extends('layouts.base')

@section('content')

<div class="text-center mt-3 grid">
    <div class="d-flex" style="height: 100px;">
        <div class="vr"></div>
    </div>
    <div>
        <h4>Producto: <strong>{{ $product->name }}</strong></h4>
    </div>
    <div>
        <h5>¿ Estás seguro de eliminar ?</h5>
    </div>

    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-outline-danger mt-2">Si</button>
        <a href="/products/" class="btn btn-outline-primary mt-2">No</a>
    </form>
</div>

@endsection