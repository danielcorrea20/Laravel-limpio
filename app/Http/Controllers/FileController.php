<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\FileModel;
use Carbon\Carbon;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recoger todos los ficheros pertenecientes al usario logueado
        $file = FileModel::where('user_id', '=', Auth::id())->get();
        // dd($file);
        return view('file.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validamos fichero
        $request->validate([
            'fichero' => 'required|file',
        ]);

        // 2. Capturamos fichero
        $archivo = $request->file('fichero');
        // dd($archivo->getClientOriginalName());
        // exit();
        $hoy = Carbon::now()->format('Y-m-d-h-m-s');
        $nombre_fichero = Auth::id() . '-' . $hoy . '-' . $archivo->getClientOriginalName();
        // dd($nombre_fichero);
        // 3. Insertamos fichero en el disco
        Storage::disk('public')->putFileAs(Auth::id(), $archivo, $nombre_fichero);
        // dd($ruta);

        // 4. Almacenar ruta en el modelo
        FileModel::create([
            'ruta' => Auth::id() . '/' . $nombre_fichero,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('file_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscamos el fichero con el identificador asociado
        $file = FileModel::find($id);
        Storage::disk('public')->delete($file->ruta);
        // dd($file->ruta);
        FileModel::destroy($id);
        return redirect()->route('file_index');
    }
}
