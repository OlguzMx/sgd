<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresasController extends Controller
{
    /**
     * FUNCTION QUE MUESTRA LOS DATOS EN EL INDEX DE LA CARPETA EMPRESAS.
     */
    public function index()
    {
        $empresa = Empresa::paginate(10);
        $empresaCount = Empresa::count();
        return view('empresas.index')->with(['Empresa' => $empresa, 'EmpresaCount' => $empresaCount]);
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR UNA EMPRESA.
     */
    public function create()
    {
        $empresa = Empresa::all();
        return view('empresas.create')->with(['Empresa' => $empresa]);
    }

    /**
     * CREA UNA NUEVA EMPRESA Y LO ALMACENA EN EL STORE.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:85',
            'email' => 'required|max:120|unique:clientes,email|email',
            'direccion' => 'sometimes|required|max:145',
            'ubicacion' => 'sometimes|required',
            'codigo_postal' => 'sometimes|required'
        ]);

        Empresa::create([
            'name' => $request->name,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'ubicacion' => $request->ubicacion,
            'codigo_postal' => $request->codigo_postal,
        ]);
        return redirect()->route('empresas.index');
    }

    /**
     * DESPLIEGA LA VISTA DE UNA EMPRESA EN ESPECÍFICO.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * MUESTRA EL FORM PARA EDITAR UNA EMPRESA EN ESPECÍFICO.
     */
    public function edit(string $id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.edit')->with(['Empresa' => $empresa]);
    }

    /**
     * ACTUALIZAR UNA EMPRESA EN ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function update(Request $request, string $id)
    {   
        // Validar campos
        $this->validate($request, [
            'name' => 'required|max:85',
            'email' => 'required|max:120|unique:clientes,email|email',
            'direccion' => 'sometimes|required|max:145',
            'ubicacion' => 'sometimes',
            'codigo_postal' => 'sometimes'
        ]);

        // Busca la empresa a actualizar
        $empresa = Empresa::find($id);

        $empresa->update([
            'name' => $request->name,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'ubicacion' => $request->ubicacion,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect()->route('empresas.index');
    }

    /**
     * ELIMINA UNA EMPRESA EN ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function destroy(string $id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
