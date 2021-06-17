<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(auth()->user()->rol == "doctor" && $id != auth()->user()->id){
            return redirect('Inicio');
        }

        $shedules = DB::select('select * from shedules where id_doctor = '.$id);

        $patients = Patient::all();

        $appointments = Appointment::all()->where('id_doctor', $id);

        return view('modules.appointments', compact('shedules', 'patients', 'appointments'));
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

    public function HorarioDoctor(Request $request)
    {
        $datos = request();

        DB::table('shedules')->insert(['id_doctor' => auth()->user()->id, 'horaInicio' => $datos["horaInicio"], 'horaFin' => $datos["horaFin"]]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function EditarHorario(Request $request)
    {
        $datos = request();

        DB::table('shedules')->where('id', $datos['id'])->update(['horaInicio' => $datos["horaInicioE"], 'horaFin' => $datos["horaFinE"]]);

        return redirect('Citas/'.auth()->user()->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CrearCitas(Request $id_doctor)
    {
        Appointment::create(['id_doctor' => request('id_doctor'), 'id_patient' => request('id_patient'), 'FyHinicio' => request('FyHinicio'), 'FyHfinal' => request('FyHfinal')]);

        return redirect('Citas/'.request('id_doctor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        DB::table('appointments')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idDoctor'));
    }
}
