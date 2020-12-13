<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getMenu();

        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionMenu $request) //Se cambia la clase Request por mi request
    {
        // dd($request->all());
        $menu = new Menu;
        $menu->nombre = $request->nombre;
        $menu->url = $request->url;
        $menu->icono = $request->icono;
        $menu->save();
        return redirect('admin/menu')->with('mensaje', 'Menú creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Menu::findOrfail($id);
        return view('admin.menu.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionMenu $request, $id)
    {
        // dd($request->all());
        $menu = Menu::findOrfail($id);
        $menu->nombre = $request->nombre;
        $menu->url = $request->url;
        $menu->icono = $request->icono;
        $menu->update();

        $notificacion = array(
            'mensaje' => 'Menú editado con éxito',
            'tipo' => 'success',
            'titulo' => 'Menú'
        );
        return redirect('admin/menu')->with($notificacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        if (Menu::destroy($id)) {
            $notificacion = array(
                'mensaje' => 'El menú eliminado correctamente',
                'tipo' => 'success',
                'titulo' => 'Menú'
            );
            return redirect('admin/menu')->with($notificacion);
        } else {
            $notificacion = array(
                'mensaje' => 'El menú no pudo ser eliminado, hay otro menú que depende de el',
                'tipo' => 'error',
                'titulo' => 'Menú'
            );
            return redirect('admin/menu')->with($notificacion);
        }
    }

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
