@extends('layouts.base')

@section('content')
<div>
    <form action="{{ route('buyconfirm') }}" class="container" method="POST">
        @csrf
        <select name="store_id" id="store" class="form-control mt-3" required>
                <option value="">--Selecciona tienda destino--</option>
            @foreach( $Store as $Store )
                <option value="{{ $Store->id }}">{{ $Store->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-bag-shopping"></i> Confirmar y Comprar</button>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>
        
    <table class="table table-striped mt-3 table-bordered text-center container" style="scroll-behavior:smooth">
        <th colspan="12" class="text-center"><i class="fa-solid fa-cart-plus"></i> Carrito de compras</th>
        <tr>
            <th>Nombre</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th><i class="fa-solid fa-dollar-sign"></i> Precio</th>
            <th></th>
            <th>Cantidad</th>
            <th></th>
            <th>Total</th>
            <th></th>
        </tr>

        @foreach( $Product as $Product )
        <tr>
            <td> {{ $Product->name }} </td>
            <td> {{ $Product->SKU }} </td>
            <td> {{ $Product->description }} </td>
            <td> $ {{ number_format($Product->price) }} </td>
            <td>
                <form action="/products/{{ $Product->id }}/temporal/minus" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-minus"></i></button>                    
                </form>
            </td>
            <td>{{ $Product->amount }}</td>
            <td>
                <form action="/products/{{ $Product->id }}/temporal/plus" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></button>                    
                </form>
            </td>
            <td>
                $ {{ number_format($Product->total) }}
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