@extends('layouts.landing')
@section('title','Home')
@section('resouce')
@vite('resources/js/ver_producto.js')
@endsection
@section('content')
<div class="d-flex justify-content-end nav-btns">
    <button class="btn btn-outline-success mx-3" onclick="window.location.href='/crear-categoria'">Crear Categoria</button>
    <button class="btn btn-primary" onclick="window.location.href='/crear-producto'">Crear Producto</button>
</div>
<div id="ver_producto" class="m-4">
</div>
@endsection