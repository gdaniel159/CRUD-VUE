<template>
  <div>
    <h1>Administracion de productos</h1>
    <table class="table table-bordered table-striped table-hover text-center mt-3">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Categoria</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="producto in productos" :key="producto.id">
          <td>{{ producto.id }}</td>
          <td>{{ producto.nombre }}</td>
          <td>{{ producto.precio }}</td>
          <td>{{ producto.categoria.nombre }}</td>
          <td class="">
            <button @click="editarProducto(producto.id)" class="btn btn-warning form-control w-25 m-2">Editar</button>
            <button @click="eliminarProducto(producto.id)" class="btn btn-danger form-control w-25 m-2">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const productos = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/api/productos/get');
    productos.value = response.data.Productos;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
});

const editarProducto = (id) => {
  window.location.href = `/editar-producto/${id}`;
};

const eliminarProducto = async (id) => {
  try {

    await axios.delete(`/api/productos/eliminar/${id}`);

    const response = await axios.get('/api/productos/get');
    productos.value = response.data.Productos;

    console.log('Producto eliminado con éxito.');

  } catch (error) {
    console.error('Error eliminando producto:', error);
  }
};

</script>

<style scoped></style>