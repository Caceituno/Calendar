<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
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
    public function index()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "secretaria"){
            return redirect("Inicio");
        }

        $consultants = Consultant::all();
        $doctors = Doctor::all();

        //return view('modules.doctors')->with('consultants', $consultants);
        return view('modules.doctors', compact('consultants', 'doctors'));
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
        $datos = request()->validate([
            'name' => ['required'],
            'sex' => ['required'],
            'id_clinic' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users']
        ]);

        Doctor::create([
            'name' => $datos['name'],
            'id_clinic' => $datos['id_clinic'],
            'email' => $datos['email'],
            'sex' => $datos['sex'],
            'document' => '2',
            'phone' => '22',
            'rol' => 'doctor',
            'password' => Hash::make($datos['password'])
        ]);

        return redirect('Doctores')->with('registrado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->whereId($id)->delete();

        return redirect('Doctores');
    }
}
