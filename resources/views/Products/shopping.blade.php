@extends('layouts.base')

@section('content')
<div>
    <form action="/products/buy/confirm" class="container">
        @csrf
        <a href="/products/buyconfirm" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-bag-shopping"></i> Comprar</a>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
        <input type="number" class="form-control mt-2" placeholder="Código tienda">
    </form>
        
    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center"><i class="fa-solid fa-cart-plus"></i> Carrito de compras</th>
        <tr>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th><i class="fa-solid fa-dollar-sign"></i> Precio</th>
            <th></th>
            <th>Cantidad</th>
            <th></th>
            <th></th>
        </tr>

        @foreach( $Product as $Product )
        <tr>
            <td> {{ $Product->name }} </td>
            <td> {{ $Product->SKU }} </td>
            <td> {{ $Product->description }} </td>
            <td> {{ $Product->price }} </td>
            <td>
                <form action="/products/{{ $Product->id }}/temporal/minus" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-minus"></i></button>                    
                </form>
            </td>
            <td> {{ $Product->amount }}</td>
            <td>
                <form action="/products/{{ $Product->id }}/temporal/plus" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></button>                    
                </form>
            </td>
            <td>
                <form action="/products/{{ $Product->id }}/temporalsale/down" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>                    
                </form>
            </td>
                
        </tr>
        @endforeach

    </table>
</div>
@endsection