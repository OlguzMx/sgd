<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    //
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        $proveedoresCount = $proveedores->count();
        return view('proveedores.index', [
            'Proveedores' => $proveedores,
            'ProveedoresCount' => $proveedoresCount
        ]);
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.create')->with(['Proveedor' => $proveedores]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:145',
            'direccion' => 'required|max:245',
            'name_contacto' => 'required|max:145',
            'telefono' => 'required|max:13',
        ]);

        Proveedor::create([
            'name' => $request->name,
            'direccion' => $request->direccion,
            'name_contacto' => $request->name_contacto,
            'telefono' => $request->telefono,
        ]);

        return redirect(route('proveedores.index'))->with('alerta', 'Se ha creado el Proveedor Correctamente');
    }

    public function edit(string $id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.edit', [
            'Proveedor' => $proveedor,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), []);
            $proveedor = Proveedor::find($id);
            $proveedor->name = $request->name;
            $proveedor->direccion = $request->direccion;
            $proveedor->name_contacto = $request->name_contacto;
            $proveedor->telefono = $request->telefono;
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator->messages())
                    ->withInput($request->input());
            }
            $proveedor->update();

            return redirect(route('proveedores.index'))->with('alerta', 'Se ha editado el Proveedor Correctamente');
            
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "Message" => $e->getMessage()];
        };
    }
    public function destroy(string $id)
    {
        try {
            $proveedor = Proveedor::find($id);
            $proveedor->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
