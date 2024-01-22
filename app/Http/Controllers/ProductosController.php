<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    // Listar
    public function get()
    {
        $producto = Producto::with('categoria')->get();
        return response()->json(["Productos" => $producto]);
    }

    // Listar por id

    public function getId($id)
    {
        $producto = Producto::where('id',$id)->first();
        return response()->json(["producto" => $producto]);
    }

    // Almacenar
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $producto = Producto::updateOrcreate([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'id_categoria' => $request->id_categoria
            ]);
            DB::commit();
            return response()->json(['message' => 'Producto creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear el producto: " . $e->getMessage()], 500);
        }
    }
    // Actualizar
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $producto = Producto::find($id);

            if (!$producto) {
                return response()->json(['error' => 'Producto no encontrado'], 404);
            }

            $producto->update([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'id_categoria' => $request->id_categoria
            ]);

            DB::commit();
            return response()->json(['message' => 'Producto actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el producto: " . $e->getMessage()], 500);
        }
    }
    // Eliminar
    public function eliminar($id)
    {
        try {
            DB::beginTransaction();
            $producto = Producto::find($id);

            if (!$producto) {
                return response()->json(['error' => 'Producto no encontrado'], 404);
            }

            $producto->delete();

            DB::commit();
            return response()->json(['message' => 'Producto eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el producto: " . $e->getMessage()], 500);
        }
    }

    public function mostrarFormularioEdicion($id) {
        $producto = Producto::find($id);
        if (!$producto) {
            return redirect()->route('home');
        }
        return view('editar_producto', ['producto' => $producto]);
    }

    public function mostrarFormularioCreacion() {
        return view('crear_producto');
    }
}
