<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    // Listar
    public function get()
    {
        $categorias = Categoria::all();
        return response()->json(["Categorias" => $categorias]);
    }

    public function getId($id)
    {
        $categorias = Categoria::where('id',$id)->first();
        return response()->json(["Categorias" => $categorias]);
    }

    // Almacenar
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $categoria = Categoria::updateOrCreate([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
            DB::commit();
            return response()->json(['message' => 'Categoría creada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear la categoría: " . $e->getMessage()], 500);
        }
    }

    // Actualizar
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $categoria = Categoria::find($id);

            if (!$categoria) {
                return response()->json(['error' => 'Categoría no encontrada'], 404);
            }

            $categoria->update([
                'nombre' => $request->nombre,
            ]);

            DB::commit();
            return response()->json(['message' => 'Categoría actualizada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar la categoría: " . $e->getMessage()], 500);
        }
    }

    // Eliminar
    public function eliminar($id)
    {
        try {
            DB::beginTransaction();
            $categoria = Categoria::find($id);

            if (!$categoria) {
                return response()->json(['error' => 'Categoría no encontrada'], 404);
            }

            $categoria->delete();

            DB::commit();
            return response()->json(['message' => 'Categoría eliminada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar la categoría: " . $e->getMessage()], 500);
        }
    }

    public function formularioCrearCategoria() {
        return view('crear_categoria');
    }

}
