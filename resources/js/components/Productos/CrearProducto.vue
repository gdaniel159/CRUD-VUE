<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crear Nuevo Producto</h1>
                <form @submit.prevent="crearProducto" class="form">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" v-model="producto.nombre" id="nombre" name="nombre" required
                            class="form-control mt-3 mb-3">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" v-model="producto.precio" id="precio" name="precio" required
                            class="form-control mt-3 mb-3">
                    </div>
                    <div class="form-group">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select v-model="producto.id_categoria" id="categoria" name="categoria" required
                            class="form-control mt-3 mb-3">
                            <option value="" disabled selected>Seleccione una categoría</option>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
                                {{ categoria.nombre }} - {{ categoria.descripcion }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Crear Producto</button>
                        <button class="btn btn-warning mt-2 form-control" onclick="window.location.href='/'">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const producto = ref({
    nombre: '',
    precio: 0,
});

const categorias = ref([]);

const getCategorias = async () => {
    try {
        const response = await axios.get('/api/categorias/get');
        categorias.value = response.data.Categorias;
    } catch (error) {
        console.error('Error al obtener las categorías:', error);
    }
};

getCategorias();

const crearProducto = async () => {
    try {
        const response = await axios.post('/api/productos/crear', producto.value);
        if (response.status === 200 && response.data.message === 'Producto creado correctamente') {
            console.log('Producto creado exitosamente:', response.data.message);
            window.location.href = '/';
        } else {
            console.error('Error al crear el producto:', response.data.message);
        }
    } catch (error) {
        console.error('Error al crear el producto:', error);
    }
};
</script>