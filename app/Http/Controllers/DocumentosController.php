<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Validator;

class DocumentosController extends Controller
{
    /**
     * FUNCTION QUE MUESTRA LOS DATOS EN EL INDEX DE LA CARPETA DOCUMENTOS
     */
    public function index()
    {
        $documentos = Documento::paginate(10);
        $documentoCount = Documento::count();
       
        return view('documentos.index', [
            'documentos' => $documentos,
            'DocumentoCount' => $documentoCount,
            
        ]);
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR UN DOCUMENTO.
     */
    public function create()
    {
        $documento = Documento::all();
        $tipoDocumento = TipoDocumento::all();
        $user = User::all();
        $cliente = Cliente::all();
        return view('documentos.create')->with(['Documento' => $documento, 'TipoDocumento' => $tipoDocumento, 'User' => $user, 'Cliente' => $cliente]);
    }

    /**
     * CREA UN NUEVO DOCUMENTO Y LO ALMACENA EN EL STORE.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:85',
            'tipos_documentos_id' => 'required',
            'users_id' => 'required',
            'clientes_id' => 'required',
        ]);

        try {
            Documento::create([
                'titulo' => $request->titulo,
                'tipos_documentos_id' => $request->tipos_documentos_id,
                'users_id' => $request->users_id,
                'clientes_id' => $request->clientes_id,
            ]);
            return redirect()->route('documentos.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "messages" => $e->getMessage()];
        }
    }
 
    /**
     * DESPLIEGA LA VISTA DE UN DOCUMENTO EN ESPECÍFICO.
     */
    public function show($id)
    {
        $documento = Documento::find($id);
        // dd($documento);
        return view('documentos.show', [
            'Documentos' => $documento,
        ]);
    }

    /**
     * MUESTRA EL FORM PARA EDITAR UN DOCUMENTO ESPECÍFICO.
     */
    public function edit(string $id)
    {
        $documento = Documento::find($id);
        $tipoDocumento = TipoDocumento::all();
        $user = User::all();
        $cliente = Cliente::all();
        return view('documentos.edit')->with(['Documento' => $documento, 'TipoDocumento' => $tipoDocumento, 'User' => $user, 'Cliente' => $cliente]);
    }

    /**
     * ACTUALIZAR UN DOCUMENTO ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), []);
            $documento = Documento::find($id);
            $documento->titulo = $request->titulo;
            $documento->tipos_documentos_id = $request->tipos_documentos_id;
            $documento->users_id = $request->users_id;
            $documento->clientes_id = $request->clientes_id;
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator->messages())
                    ->withInput($request->input());
            }
            $documento->update();
            return redirect()->route('documentos.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "Message" => $e->getMessage()];
        };
    }

    /**
     * ELIMINA UN DOCUMENTO ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function destroy(string $id)
    {
        try {
            $documento = Documento::find($id);
            $documento->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
