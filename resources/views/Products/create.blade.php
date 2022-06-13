@extends('layouts.base')

@section('content')
<div class=" text-center mt-3">
    <div>
        <h4><i class="fa-solid fa-circle-plus"></i> Nuevo Producto</h4>
    </div>  

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products" method="POST" class="container">
        @csrf
        <div class="form-group mt-3">
            <input type="text" name="name" id="name" class="form-control text-center" placeholder="Nombre" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-3">
            <input type="number" name="SKU" id="SKU" class="form-control text-center" placeholder="SKU" value="{{ old('SKU') }}">
        </div>
        <div class="form-group mt-3">
            <input type="text" name="description" id="description" class="form-control text-center" placeholder="Descripción" value="{{ old('description') }}">
        </div>
        <div class="form-group mt-3">
            <input type="number" name="price" id="price" class="form-control text-center" placeholder="Precio" value="{{ old('price') }}">
        </div>
        <div class="form-group mt-3">
            <input type="number" name="stock" id="stock" class="form-control text-center" placeholder="Stock" value="{{ old('stock') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

</div>

@endsection