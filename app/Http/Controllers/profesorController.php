<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class profesorController extends Controller
{

    public function __construct()
    {
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
        if (auth()->user()->hasRole('Profesor')) {
            $profesores = Profesor::orderByDesc('nombre')->get();
        } else if (auth()->user()->hasRole('Alumno')) {
            $profesores = Profesor::where('id', '<', 3)->orderByDesc('nombre')->get();
        } else {
            $profesores = Profesor::orderByDesc('nombre')->get();
        }

        // DB::select('SELECT * FROM coches WHERE id > 1')->get();

        return view('profesor.index', compact('profesores'));
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
        return view('profesor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido' => 'string|max:15',
            'dni' => 'max:9',
            'fecha_nacimiento' => 'required',
            'telefono' => 'max:9'

        ], [
            'nombre.required' => 'Debes insertar un dato',
            'nombre.string' => 'El dato debe ser una cadena de caracteres',
            'nombre.max' => 'Has excedido el numero de caracteres. El maximo es 20',
            'apellido.string' => 'El dato debe ser una cadena de caracteres',
            'apellido.max' => 'Has excedido el numero de caracteres. El maximo es 15',
            'dni.max' => 'Has excedido el numero de caracteres. El maximo es 9',
            'fecha_nacimiento.required' => 'Debes insertar una fecha',
            'telefono.max' => 'Has excedido el numero de caracteres. El maximo es 9'

        ]);
        Profesor::create([
            'nombre' => $validacion['nombre'],
            'apellido' => $validacion['apellido'],
            'dni' => $validacion['dni'],
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $validacion['telefono']

        ]);
        return redirect()->route('profesores-index');

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
        $profesor = Profesor::find($id);
        return view('profesor.edit', compact('profesor'));
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
        $profesor = Profesor::find($id);
        $profesor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apaellido,
            'DNI' => $request->dni,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,

        ]);
        return redirect()->route('profesor-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::destroy($id);

        return redirect()->route('profesor-index');
    }
}
