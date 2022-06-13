@extends('layouts.base')

@section('content')
<div>
    <div class="container">
        <a class="btn btn-outline-primary mt-3" href="/products/create"><i class="fa-solid fa-circle-plus"></i> Crear producto</a>
        <a class="btn btn-outline-success mt-3" href="{{ route('shopping') }}"><i class="fa-solid fa-cart-plus"></i> Ver carrito</a>
    </div>
    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center">Productos</th>
        <tr>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Cantidad</th>
            <th></th>
        </tr>

        @foreach( $Product as $Product )
        <tr>
            <td> {{ $Product->name }} </td>
            <td> {{ $Product->SKU }} </td>
            <td> {{ $Product->description }} </td>
            <td> {{ $Product->price }} </td>
            <td> {{ $Product->stock }} </td>
            <td> <input type="number" value="1" class="text-center form-control"></td>
            <td> 
                <form action="/products/{{ $Product->id }}/temporalsale" method="POST">
                @csrf
                @method('put')
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-circle-plus mb-2"></i></button>
                    <a class="btn btn-outline-secondary" href="/products/{{ $Product->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-outline-danger" href="/products/{{ $Product->id }}/confirmDelete"><i class="fa-solid fa-circle-minus"></i></a>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection