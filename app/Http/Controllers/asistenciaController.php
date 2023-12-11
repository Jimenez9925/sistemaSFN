<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class asistenciaController extends Controller
{
    public function index(Request $request)
    {
        $trabajadorasistencia = Trabajador::select(
            DB::raw("CONCAT(apellidos) AS name"), 'id'
        )->orderby('apellidos', 'asc')->pluck('name', 'id');

        $mesSeleccionado = $request->get('mes', date('m'));

        $asistenciasPorMes = Asistencia::select(
            'trabajador_id',
            'estado',
            DB::raw("COUNT(*) as cantidad")
        )
            ->whereMonth('fecha', $mesSeleccionado)
            ->groupBy('trabajador_id', 'estado')
            ->get();

        $data = [];

        foreach ($trabajadorasistencia as $trabajadorId => $trabajadorName) {
            $mesesData = [];

            foreach ($asistenciasPorMes as $asistenciaMes) {
                if ($asistenciaMes->trabajador_id == $trabajadorId) {
                    $estado = $asistenciaMes->estado;
                    $cantidad = $asistenciaMes->cantidad;

                    $mesesData[$estado] = $cantidad;
                }
            }

            if (!empty($mesesData)) {
                // Agregar solo si hay registros de asistencia o falta
                $data[] = [
                    'trabajador' => $trabajadorName,
                    'meses' => array_map('ucfirst', $mesesData),
                ];
            }
        }
        $asistencia = new Asistencia();
        $asistencias = Asistencia::orderBy('fecha', 'asc')->get();

        return view('asistencia.index', compact('trabajadorasistencia', 'data', 'mesSeleccionado', 'asistencia', 'asistencias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de campos
        $this->validate($request, [
            'estado' => 'required',
            'fecha' => 'required',
            'trabajador_id' => 'required',
            'entrada' => 'required',
            'salida'

        ]);

        // Verificar si ya existe una asistencia para el trabajador en la misma fecha
        $existingAsistencia = Asistencia::where('trabajador_id', $request->trabajador_id)
            ->whereDate('fecha', $request->fecha)
            ->first();

        if ($existingAsistencia) {
            // Si ya existe una asistencia para el trabajador en la misma fecha, muestra un mensaje de error o redirige al usuario
            return redirect()->back()->with('error', 'El trabajador ya ha registrado asistencia para esta fecha.');
        }

        // Si no existe una asistencia para el trabajador en la misma fecha, crea una nueva asistencia
        $asistencia = Asistencia::create($request->all());

        // Redireccionar a la vista index y enviar mensaje de éxito
        return redirect()->route('asistencia.index')->with('create', 'Registro agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de campos
        $this->validate($request, [
            'estado' => 'required',
            'entrada' => 'required',
            'salida'
        ]);

        // Verificar si ya existe una asistencia para el trabajador en la misma fecha, excluyendo la asistencia actual
        $existingAsistencia = Asistencia::where('trabajador_id', $request->trabajador_id)
            ->whereDate('fecha', $request->fecha)
            ->where('id', '!=', $id)
            ->first();

        if ($existingAsistencia) {
            // Si ya existe una asistencia para el trabajador en la misma fecha, muestra un mensaje de error o redirige al usuario
            return redirect()->back()->with('error', 'El trabajador ya ha registrado asistencia para esta fecha.');
        }

        // Actualiza la asistencia si no hay conflicto de fecha
        $asistencia = Asistencia::find($id);
        $asistencia->update($request->all());

        // Redireccionar a la vista index y enviar mensaje de éxito
        return redirect()->route('asistencia.index')->with('update', 'Registro actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}