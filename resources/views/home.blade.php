<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    @vite('resources/js/ver_producto.js')
</head>

<body>
    <div class="d-flex justify-content-end">
        <button class="btn btn-outline-success mx-4 mt-4" onclick="window.location.href='/crear-categoria'">Crear Categoria</button>
        <button class="btn btn-primary mx-4 mt-4" onclick="window.location.href='/crear-producto'">Crear Producto</button>
    </div>
    <div id="ver_producto" class="m-4">
    </div>
</body>

</html>