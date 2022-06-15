@extends('layouts.base')

@section('content')
<div>
    <h4 class="container mt-3">Filtro de compras por tienda</h4>
    <form action="{{ route('dashboard') }}" class="container">
        @csrf
        <select name="store_id" id="store" class="form-control mt-3" required>
                <option value="">--Selecciona una tienda--</option>
            @foreach( $Stores as $Store )
                @if( $Store->id == $selectedstore_id )
                    <option selected="true" value="{{ $Store->id }}">{{ $Store->name }}</option>
                @else
                <option value="{{ $Store->id }}">{{ $Store->name }}</option>
                @endif
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-primary mt-3"> Filtrar</button>
        
        <div class="mt-2">
            <strong>Total compras: </strong>
            <h4 class="text-success">$ {{ number_format($Sum) }}</h6>
        </div>

    </form>
    
    @if( count($ProductPyments) > 0 )   
    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center"> Compras realizadas por tienda</th>
        <tr>
            <th>Producto</th>
            <th>SKU</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>

        @foreach( $ProductPyments as $Product )
        <tr>
            <td> {{ $Product->productname }} </td>
            <td> {{ $Product->SKU }} </td>
            <td> {{ $Product->description }} </td>
            <td> {{ $Product->pymentsamount }} </td>
            <td> $ {{ number_format($Product->unitprice) }} </td>
            <td> $ {{ number_format($Product->pymentsamount * $Product->unitprice) }} </td>
        </tr>
        @endforeach
    </table>
    @else
    <p class="text-center mt-3">-- Esta tienda no ha realizado compras -- </p>
    @endif
</div>
@endsection