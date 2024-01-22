<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crear Nuevo Categoria</h1>
                <form @submit.prevent="crearCategoria" class="form">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" v-model="categoria.nombre" id="nombre" name="nombre" required
                            class="form-control mt-3 mb-3">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" v-model="categoria.descripcion" id="descripcion" name="descripcion" required
                            class="form-control mt-3 mb-3">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Crear Categoria</button>
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

const categoria = ref({
    nombre: '',
    descripcion: '',
});

const crearCategoria = async () => {
    try {
        const response = await axios.post('/api/categoria/crear', categoria.value);
        if (response.status === 200 && response.data.message === 'Categoría creada correctamente') {
            console.log('Categoria creado exitosamente:', response.data.message);
            window.location.href = '/';
        } else {
            console.error('Error al crear el Categoria:', response.data.message);
        }
    } catch (error) {
        console.error('Error al crear el Categoria:', error);
    }
};
</script>