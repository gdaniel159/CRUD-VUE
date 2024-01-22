<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Editar Producto</h1>
        <form @submit.prevent="guardarCambios" class="mt-3">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" v-model="producto.nombre" required class="form-control mt-2 mb-3">
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" v-model="producto.precio" required class="form-control mt-2 mb-3">
          </div>
          <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" v-if="producto.categoria" v-model="producto.categoria.nombre" disabled
              class="form-control mt-2 mb-3">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Guardar cambios</button>
            <button class="btn btn-warning mt-2 form-control" onclick="window.location.href='/'">Regresar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const id = window.location.pathname.split('/').pop();
const producto = ref({
  id: null,
  nombre: '',
  precio: 0,
  categoria: {
    id: null,
    nombre: '',
    descripcion: '',
  }
});

const obtenerDetallesProducto = async () => {
  try {
    const response = await axios.get(`/api/productos/get/${id}`);
    console.log(response.data);

    producto.value = response.data.producto;

    const responseCategoria = await axios.get(`/api/categorias/get/${producto.value.id_categoria}`);

    const categorias = Array.isArray(responseCategoria.data.Categorias)
      ? responseCategoria.data.Categorias
      : [responseCategoria.data.Categorias];

    producto.value.categoria = categorias[0];

  } catch (error) {
    console.error('Error obteniendo detalles del producto:', error);
  }
};

const guardarCambios = async () => {
  try {
    await axios.post(`/api/productos/actualizar/${id}`, producto.value);
    console.log('Cambios guardados exitosamente');
    window.location.href = '/';
  } catch (error) {
    console.error('Error al guardar cambios:', error);
  }
};

onMounted(() => {
  obtenerDetallesProducto();
});
</script>
  
<style scoped>
</style>