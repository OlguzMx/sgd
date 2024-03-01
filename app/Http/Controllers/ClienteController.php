<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * FUNCTION QUE MUESTRA LOS DATOS EN EL INDEX DE LA CARPETA CLIENTES
     */
    public function index()
    {
        $cliente = Cliente::paginate(10);
        $empresa = Empresa::all();
        $clienteCount = Cliente::count();
        return view('clientes.index')->with(['Cliente' => $cliente, 'ClienteCount' => $clienteCount, 'Empresa' => $empresa]);
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR UN CLIENTE.
     */
    public function create()
    {
        $cliente = Cliente::all();
        $empresa = Empresa::all();
        return view('clientes.create')->with(['Cliente', $cliente, 'Empresa' => $empresa]);
    }

    /**
     * CREA UN NUEVO CLIENTE Y LO ALMACENA EN EL STORE.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:85',
            'email' => 'required|max:120|unique:clientes,email|email',
            'puesto' => 'sometimes|required|max:45',
            'num_cel' => 'sometimes|max:13',
            'num_fijo' => 'sometimes|max:13',
            'extension' => 'sometimes|max:3',
            'empresas_id' => 'sometimes',
        ]);

        try {
            Cliente::create([
                'name' => $request->name,
                'email' => $request->email,
                'puesto' => $request->puesto,
                'num_cel' => $request->num_cel,
                'num_fijo' => $request->num_fijo,
                'extension' => $request->extension,
                'empresas_id' => $request->empresas_id,
            ]);
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "messages" => $e->getMessage()];
        }
    }

    /**
     * DESPLIEGA LA VISTA DE UN CLIENTE EN ESPECÍFICO.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * MUESTRA EL FORM PARA EDITAR UN CLIENTE ESPECÍFICO.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        $empresa = Empresa::all();
        return view('clientes.edit')->with(['Clientes' => $cliente, 'Empresa' => $empresa]);
    }

    /**
     * ACTUALIZAR UN CLIENTE ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), []);
            $cliente = Cliente::find($id);
            $cliente->name = $request->name;
            $cliente->email = $request->email;
            $cliente->puesto = $request->puesto;
            $cliente->num_cel = $request->num_cel;
            $cliente->num_fijo = $request->num_fijo;
            $cliente->extension = $request->extension;
            $cliente->empresas_id = $request->empresas_id;
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator->messages())
                    ->withInput($request->input());
            }
            $cliente->update();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "Message" => $e->getMessage()];
        };
    }

    /**
     * ELIMINA UN CLIENTE ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::find($id);
            $cliente->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
