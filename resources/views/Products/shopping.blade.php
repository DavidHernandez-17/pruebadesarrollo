@extends('layouts.base')

@section('content')
<div>
    <form action="/products/buy/confirm" class="container">
        @csrf
        <a href="{{ route('buyconfirm') }}" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-bag-shopping"></i> Comprar</a>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center"><i class="fa-solid fa-cart-plus"></i> Carrito de compras</th>
        <tr>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th><i class="fa-solid fa-dollar-sign"></i> Precio</th>
            <th>Unidades disponibles</th>
            <th></th>
        </tr>

        @foreach( $Product as $Product )
        <tr>
            <td> {{ $Product->name }} </td>
            <td> {{ $Product->SKU }} </td>
            <td> {{ $Product->description }} </td>
            <td> {{ $Product->price }} </td>
            <td> {{ $Product->stock }} </td>
            <td>
                <form action="/products/{{ $Product->id }}/temporalsale/down" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-minus"></i></button>                    
            </td>
            </form>
        </tr>
        @endforeach

    </table>
</div>
@endsection