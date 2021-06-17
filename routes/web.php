<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('modules.select');
});

Route::get('/Ingresar', function () {
    return view('modules.enter');
});

Auth::routes();

Route::get('Inicio', [EnterController::class, 'index']);
Route::get('Consultorios', [ConsultantController::class, 'index']);
Route::post('Consultorios', [ConsultantController::class, 'store']);
Route::put('Consultorio/{id}', [ConsultantController::class, 'update']);
Route::delete('borrar-Consultorio/{id}', [ConsultantController::class, 'destroy']);

Route::get('Doctores', [DoctorController::class, 'index']);
Route::delete('borrar-Consultorio/{id}', [ConsultantController::class, 'destroy']);
Route::post('Doctores', [DoctorController::class, 'store']);
Route::get('Eliminar-Doctor/{id}', [DoctorController::class, 'destroy']);

Route::get('Pacientes', [PatientController::class, 'index']);
Route::get('Crear-Paciente', [PatientController::class, 'create']);
Route::post('Crear-Paciente', [PatientController::class, 'store']);
Route::post('Pacientes', [PatientController::class, 'store']);
Route::get('editar-Paciente/{id}', [PatientController::class, 'edit']);
Route::put('actualizar-paciente/{patient}', [PatientController::class, 'update']);
Route::get('Eliminar-Paciente/{id}', [PatientController::class, 'destroy']);

Route::get('/Citas/{id}', [AppointmentController::class, 'index']);
Route::post('Horario', [AppointmentController::class, 'HorarioDoctor']);
Route::put('editar-horario/{id}', [AppointmentController::class, 'EditarHorario']);
Route::post('/Citas/{id_doctor}', [AppointmentController::class, 'CrearCitas']);
Route::delete('borrar-cita', [AppointmentController::class, 'destroy']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
