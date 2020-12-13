<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Admin\UsuarioRol;
use App\User;
use Illuminate\Http\Request;

class UsuarioRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariosRol = UsuarioRol::select('usuario_id', 'rol_id')->get();
        $usuarios = User::orderby('id')->get();
        $roles = Rol::orderBy('id')->get();
        return view('admin.usuarioRol.index', compact('usuariosRol', 'usuarios', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $usuario = new User();
            if ($request->input('estado') == 1) {
                $usuario->find($request->input('id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $usuario->find($request->input('id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
