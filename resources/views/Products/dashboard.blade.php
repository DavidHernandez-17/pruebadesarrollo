@extends('layouts.base')

@section('content')
<div>
    <form action="/products/buy/confirm" class="container">
        @csrf
        <a class="btn btn-outline-secondary mt-3" href="/products"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

    
</div>
@endsection