<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Models\Enfermedad_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[LoginController::class,'login']);

Route::get('/citas',[CitaController::class,'list']);
Route::post('/guardarcita',[CitaController::class,'save']);
Route::post('/borrar/cita',[CitaController::class,'delete']);



Route::get('/pacientes',[PacienteController::class,'list']);
Route::post('/guardar/paciente',[PacienteController::class,'save']);
Route::post('/borrar/paciente',[PacienteController::class,'delete']);


Route::get('/medicos',[MedicoController::class,'list']);
Route::post('/guardar/medico',[MedicoController::class,'save']);
Route::post('/borrar/medico',[MedicoController::class,'delete']);

Route::get('/enfermedades',[EnfermedadController::class,'list']);
Route::post('/guardar/enfermedad',[EnfermedadController::class,'save']);
Route::post('/borrar/enfermedad',[EnfermedadController::class,'delete']);