<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    /**
     * FUNCTION QUE MUESTRA LOS DATOS EN EL INDEX DE LA CARPETA USUARIOS
     */
    public function index()
    {
        $user = User::all();
        $userCount = User::count();
        return view('usuarios.index')->with(['User' => $user, 'UserCount' => $userCount]);
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR UN USUARIO.
     */
    public function create()
    {
        $user = User::all();
        return view('usuarios.create')->with(['User' => $user]);
    }

    /**
     * CREA UN NUEVO USUARIO Y LO ALMACENA EN EL STORE.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:85',
            'email' => 'required|max:120|unique:users,email|email',
            'password' => 'required|confirmed|min:5',
            'rol' => 'sometimes'
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => $request->rol,
            ]);
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "messages" => $e->getMessage()];
        }
    }

    /**
     * DESPLIEGA LA VISTA DE UN USUARIO EN ESPECÍFICO.
     */
    public function show(string $id)
    {
    }

    /**
     * MUESTRA EL FORM PARA EDITAR UN USUARIO ESPECÍFICO.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('usuarios.edit')->with(['User' => $user]);
    }

    /**
     * ACTUALIZAR UN USUARIO ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), []);
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->rol = $request->rol;
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator->messages())
                    ->withInput($request->input());
            }
            $user->update();
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return ["Error" => $e->getCode(), "Message" => $e->getMessage()];
        };
    }

    /**
     * ELIMINA UN USUARIO ESPECÍFICO DEL ALMACENAMIENTO.
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return ["Error" => 0];
        } catch (\Exception $e) {
            ["Error" => $e->getCode(), 'Message' => $e->getMessage()];
        }
    }
}
