@extends('layouts.base')

@section('content')
<div class="text-center">
    <div class="mt-3">
        <h4><i class="fa-solid fa-pen-to-square"></i>Editar Producto</h4>
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

    <form action="/products/{{ $product->id }}" method="POST" class="container">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="text-primary">Nombre</label>
            <input type="text" name="name" id="name" class="form-control text-center" value="{{ $product->name }}" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">SKU</label>
            <input type="number" readonly name="SKU" id="SKU" class="form-control text-center" value="{{ $product->SKU }}" value="{{ old('SKU') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Descripción</label>
            <input type="text" name="description" id="description" class="form-control text-center" value="{{ $product->description }}" value="{{ old('description') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Precio</label>
            <input type="number" name="price" id="price" class="form-control text-center" value="{{ $product->price }}" value="{{ old('price') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control text-center" value="{{ $product->stock }}" value="{{ old('stock') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>

    </form>

</div>

@endsection