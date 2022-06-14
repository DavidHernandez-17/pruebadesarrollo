@extends('layouts.base')

@section('content')
<div>
    <table class="table table-striped mt-3 table-bordered text-center container">
        <th colspan="12" class="text-center">Tiendas</th>
        <tr>
            <th>Nombre</th>
            <th>Geolocalización</th>
            <th>Fecha de apertura</th>
        </tr>

        @foreach( $Store as $Store )
        <tr>
            <td> {{ $Store->name }} </td>
            <td> {{ $Store->geolocalitation }} </td>
            <td> {{ $Store->openingdate }} </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection