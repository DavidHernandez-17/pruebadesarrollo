@extends('layouts.base')

@section('content')
<div>
    <form action="/products/buy/confirm" class="container">
        @csrf
        <a href="{{ route('buyconfirm') }}" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-bag-shopping"></i> Comprar</a>
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

    
</div>
@endsection