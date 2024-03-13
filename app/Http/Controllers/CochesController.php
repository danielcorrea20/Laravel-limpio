<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;
use App\Models\User;
// use Illuminata\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CochesController extends Controller
{
    public function __construct(){
        // Solo es posible realizar alguna de las funciones de CochesController si estoy autenticado
        $this->middleware('auth'); 
        // Solo es posible realizar alguna de las funciones de CochesController si el usuario
        // tiene el rol de profesor o de alumno
        $this->middleware(['role:Profesor|Alumno']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('Profesor')){
            $coches = Coche::orderByDesc('marca')->get();
        }else if (auth()->user()->hasRole('Alumno')){
            $coches = Coche::where('id','<',3)->orderByDesc('marca')->get();
        }else{
            $coches = Coche::orderByDesc('marca')->get();
        }
        
        // DB::select('SELECT * FROM coches WHERE id > 1')->get();

        return view('coches.index', compact('coches'));
        // return view('coches.index', [
        //     'coches' => $coches,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('coches.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Validacion de datos antes de insertar
         * 
         * validate()
         */
        $validacion = $request->validate([
            'marca' => 'required|string|max:20',
            'modelo' => 'string|max:15',
            'fecha_matriculacion' => 'required',
            'user_id' => [
                'numeric',
                Rule::exists('users', 'id')->where(function($query){
                    return $query->whereNotNull('id');
                })
            ]
        ],[
            'marca.required' => 'Debes insertar un dato',
            'marca.string' => 'El dato debe ser una cadena de caracteres',
            'marca.max' => 'Has excedido el numero de caracteres. El maximo es 20',
            'modelo.string' => 'El dato debe ser una cadena de caracteres',
            'modelo.max' => 'Has excedido el numero de caracteres. El maximo es 15',
            'fecha_matriculacion.required' => 'Debes insertar una fecha', 
            'user_id.numeric' => 'El dato debe ser un numero',
            'user_id.exists' => 'El usuario no existe'
        ]);

        /**
         * $request me proporciona los valores del formulario.
         * Lo identifico con el 'name' correspondiente en el 'input'
         * 
         * Para insertar valor, usamos 'create' y un array con clave y valor
         */

         Coche::create([
            'marca' => $validacion['marca'],
            'modelo' => $validacion['modelo'],
            'fecha_matriculacion' => $request->fecha_matriculacion,
            'user_id' => $request->user_id
         ]);
         return redirect()->route('coches-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        var_dump("El identificador recibido es: " .$id);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coche = Coche::find($id);
        return view('coches.edit', compact('coche'));
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
        /**
         * Buscar por id el coche que se va a actualizar
         * 
         * Usar los datos recibidos en $request para actualizar esos datos
         */
        $coche = Coche::find($id);
        $coche->update([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'fecha_matriculacion' => $request->fecha_matriculacion,
            'user_id' => $request->user_id
        ]);
        return redirect()->route('coches-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // OPCION A. Usamos cuando es clave primaria el dato a eliminar
        Coche::destroy($id);

        // OPCION B. Usamos cuando no es una PK el dato que tengo para eliminar.
        // Coche::where('id', '=', $id)->delete();

        // OPCION C. Usamos cuando necesitamos recoger el objeto entero antes de tratarlo
        // $coche = Coche::find($id);
        // $coche->delete();
       return redirect()->route('coches-index');
    }
}
