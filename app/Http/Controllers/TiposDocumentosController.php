<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Validator;

class TiposDocumentosController extends Controller
{
    /**
     * FUNCTION QUE MUESTRA LOS DATOS EN EL INDEX DE LA CARPETA TIPO DE DOCUMENTOS.
     */
    public function index()
    {
        $tipoDocumento = TipoDocumento::all();
        $tipoDocumentoCount = TipoDocumento::count();
        return view('tiposdocumentos.index', [
            'TipoDocumento' => $tipoDocumento,
            'TipoDocumentoCount' => $tipoDocumentoCount,
        ]);
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR UN TIPO DE DOCUMENTO.
     */
    public function create()
    {
        $tipoDocumento = TipoDocumento::all();
        return view('tiposdocumentos.create')->with(['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * CREA UN NUEVO TIPO DE DOCUMENTO Y LO ALMACENA EN EL STORE.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:85',
        ]);

        try {
            TipoDocumento::create([
                'name' => $request->name,
            ]);
            return redirect()->route('tiposdocumentos.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "messages" => $e->getMessage()];
        }
    }

    /**
     * DESPLIEGA LA VISTA DE UN TIPO DE DOCUMENTO EN ESPECÍFICO.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * MUESTRA EL FORM PARA EDITAR UN TIPO DE DOCUMENTO EN ESPECÍFICO.
     */
    public function edit(string $id)
    {
        $tipoDocumento = TipoDocumento::find($id);
        return view('tiposdocumentos.edit')->with(['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * ACTUALIZAR UN TIPO DE DOCUMENTO EN ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), []);
            $tipoDocumento = TipoDocumento::find($id);
            $tipoDocumento->name = $request->name;
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator->messages())
                    ->withInput($request->input());
            }
            $tipoDocumento->update();
            return redirect()->route('tiposdocumentos.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "Message" => $e->getMessage()];
        };
    }

    /**
     * ELIMINA UN TIPO DE DOCUMENTO EN ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function destroy(string $id)
    {
        try {
            $tipoDocumento = TipoDocumento::find($id);
            $tipoDocumento->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
