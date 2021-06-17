<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
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
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){
            return redirect("Inicio");
        }

        $patients = DB::select('select * from users where rol = "paciente"');

        return view('modules.patients')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){
            return redirect("Inicio");
        }

        return view('modules.create-patient');
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
            'document' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users']
        ]);

        Patient::create([
            'name' => $datos['name'],
            'id_clinic' => 0,
            'email' => $datos['email'],
            'sex' => $datos['sex'],
            'document' => $datos['document'],
            'phone' => '',
            'rol' => 'paciente',
            'password' => Hash::make($datos['password'])
        ]);

        return redirect('Pacientes')->with('Agregado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $id)
    {

        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){
            return redirect("Inicio");
        }
        $patient = Patient::find($id->id);

        return view('modules.edit-patient')->with('patient', $patient);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        if($patient["email"] != request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'document' => ['required'],
                'phone' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users']
            ]);

            DB::table('users')->where('id', $patient["id"])->update(['name' => $datos["name"], 'email'
                => $datos["email"], 'document' => $datos["document"], 'phone' => $datos["phone"], 'password' => Hash::make($datos["passwordN"])]);
        }else if($patient["email"] != request('email') && request('passwordN') == ""){

            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'document' => ['required'],
                'phone' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users']
            ]);

            DB::table('users')->where('id', $patient["id"])->update(['name' => $datos["name"], 'email'
                => $datos["email"], 'document' => $datos["document"], 'phone' => $datos["phone"], 'password' => Hash::make($datos["password"])]);

        }else if($patient["email"] == request('email') && request('passwordN') != ""){

            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'document' => ['required'],
                'phone' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email']
            ]);

            DB::table('users')->where('id', $patient["id"])->update(['name' => $datos["name"], 'email'
                => $datos["email"], 'document' => $datos["document"], 'phone' => $datos["phone"], 'password' => Hash::make($datos["passwordN"])]);
        }else{

            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'document' => ['required'],
                'phone' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email']
            ]);

            DB::table('users')->where('id', $patient["id"])->update(['name' => $datos["name"], 'email'
                => $datos["email"], 'document' => $datos["document"], 'phone' => $datos["phone"], 'password' => Hash::make($datos["password"])]);
        }

        return redirect('Pacientes')->with('actualizadoP', 'Si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);

        return redirect('Pacientes');
    }
}
