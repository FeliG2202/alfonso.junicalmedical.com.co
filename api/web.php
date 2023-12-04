<?php

use LionRoute\Route;
use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\AlmAcompControlador;
use PHP\Controllers\AlmTipoControlador;
use PHP\Controllers\AlmArrozControlador;
use PHP\Controllers\AlmBebidaControlador;
use PHP\Controllers\AlmDiaControlador;
use PHP\Controllers\AlmEnergeControlador;
use PHP\Controllers\AlmEnsalControlador;
use PHP\Controllers\AlmSopaControlador;
use PHP\Controllers\AlmProteControlador;
use PHP\Controllers\AlmMenuControlador;
use PHP\Controllers\PacienteControlador;
use PHP\Controllers\PedAlmMenuPaciControlador;
use PHP\Controllers\PersonaControlador;
use PHP\Controllers\RolControlador;
use PHP\Controllers\UsuarioControlador;

// consulta y exportacion de los registros de almuerzos diarios
Route::prefix('frmPed', function() {
        Route::get('read', [PedAlmMenuControlador::class, 'consultarAlmMenuApartControlador']);
        Route::get('readPaci', [PedAlmMenuControlador::class, 'consultarAlmMenuApartPaciControlador']);
        Route::post("put", [PedAlmMenuControlador::class, 'generateReportDates']);
        Route::post("putPaci", [PedAlmMenuControlador::class, 'generateReportPaciDates']);
});

// llama la los dias de la semana
Route::get('dias', [AlmDiaControlador::class, 'listarAlmDiaMenuControlador']);

// llamma las semanas registradas
Route::get('semana', [AlmDiaControlador::class, 'listarAlmSemanaMenuControlador']);

// Crud completo de Tipo Menu
Route::prefix('frmAlmTipo', function() {
    Route::post('tipo', [AlmTipoControlador::class, 'registrarAlmTipoControlador']);
    Route::get('tipo', [AlmTipoControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('tipo/{idNutriTipo}', [AlmTipoControlador::class, 'eliminarAlmTipoControlador']);
    Route::put('tipo/{idNutriTipo}', [AlmTipoControlador::class, 'actualizarAlmTipoControlador']);
});

// Crud completo de Acompañamiento
Route::prefix('frmAlmAcomp', function() {
    Route::post('acomp', [AlmAcompControlador::class, 'registrarAlmACompControlador']);
    Route::get('acomp', [AlmAcompControlador::class, 'consultarAlmACompControlador']);
    Route::delete('acomp/{idNutriAcomp}', [AlmAcompControlador::class, 'eliminarAlmACompControlador']);
    Route::put('acomp/{idNutriAcomp}', [AlmAcompControlador::class, 'actualizarAlmACompControlador']);
});

// Crud completo de Arroz
Route::prefix('frmAlmArroz', function() {
    Route::post('arroz', [AlmArrozControlador::class, 'registrarAlmArrozControlador']);
    Route::get('arroz', [AlmArrozControlador::class, 'consultarAlmArrozControlador']);
    Route::delete('arroz/{idNutriArroz}', [AlmArrozControlador::class, 'eliminarAlmArrozControlador']);
    Route::put('arroz/{idNutriArroz}', [AlmArrozControlador::class, 'actualizarAlmArrozControlador']);
});

// Crud completo de Bebidas
Route::prefix('frmAlmBebida', function() {
    Route::post('bebida', [AlmBebidaControlador::class, 'registrarAlmBebidaControlador']);
    Route::get('bebida', [AlmBebidaControlador::class, 'consultarAlmBebidaControlador']);
    Route::delete('bebida/{idNutriBebida}', [AlmBebidaControlador::class, 'eliminarAlmBebidaControlador']);
    Route::put('bebida/{idNutriBebida}', [AlmBebidaControlador::class, 'actualizarAlmBebidaControlador']);
});

// Crud completo de Proteina
Route::prefix('frmAlmProte', function() {
    Route::post('prote', [AlmProteControlador::class, 'registrarAlmTipoControlador']);
    Route::get('prote', [AlmProteControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('prote/{idNutriProte}', [AlmProteControlador::class, 'eliminarAlmProteControlador']);
    Route::put('prote/{idNutriProte}', [AlmProteControlador::class, 'actualizarAlmProteControlador']);
});

// Crud completo de Sopa
Route::prefix('frmAlmSopa', function() {
    Route::post('sopa', [AlmSopaControlador::class, 'registrarAlmSopaControlador']);
    Route::get('sopa', [AlmSopaControlador::class, 'consultarAlmSopaControlador']);
    Route::delete('sopa/{idNutriSopa}', [AlmSopaControlador::class, 'eliminarAlmSopaControlador']);
    Route::put('sopa/{idNutriSopa}', [AlmSopaControlador::class, 'actualizarAlmSopaControlador']);
});

// Crud completo de Energeticos
Route::prefix('frmAlmEnerge', function() {
    Route::post('energe', [AlmEnergeControlador::class, 'registrarAlmEnergeControlador']);
    Route::get('energe', [AlmEnergeControlador::class, 'consultarAlmEnergeControlador']);
    Route::delete('energe/{idNutriEnerge}', [AlmEnergeControlador::class, 'eliminarAlmEnergeControlador']);
    Route::put('energe/{idNutriEnerge}', [AlmEnergeControlador::class, 'actualizarAlmEnergeControlador']);
});

// Crud complero de Ensalada
Route::prefix('frmAlmEnsal', function() {
    Route::post('ensal', [AlmEnsalControlador::class, 'registrarAlmEnsalControlador']);
    Route::get('ensal', [AlmEnsalControlador::class, 'consultarAlmEnsalControlador']);
    Route::delete('ensal/{idNutriEnsal}', [AlmEnsalControlador::class, 'eliminarAlmEnsalControlador']);
    Route::put('ensal/{idNutriEnsal}', [AlmEnsalControlador::class, 'actualizarAlmEnsalControlador']);
});

// Registro, Consulta y Eliminacion de dietas Registradas por dia
Route::prefix('frmAlmMenu', function(){
    Route::post('menuEmple', [AlmMenuControlador::class, 'registrarAlmTipoControlador']);
    Route::post('menuPaci', [AlmMenuControlador::class, 'registrarAlmTipoControladorPaci']);
    Route::get('menu', [AlmMenuControlador::class, 'consultarAlmMenuControlador']);
    Route::get('menuPaci', [AlmMenuControlador::class, 'consultarAlmMenuPaciControlador']);
    Route::delete('menu/{idNutriMenu}', [AlmMenuControlador::class, 'eliminarAlmMenuControlador']);
    Route::delete('menuPaci/{idNutriMenuPaci}', [AlmMenuControlador::class, 'eliminarAlmMenuPaciControlador']);
});

//
Route::prefix('frmPedPaci', function(){
    Route::post('paci', [PedAlmMenuPaciControlador::class, 'procesarFormulario']);
    Route::get('paci/{idPaciente}',[PedAlmMenuPaciControlador::class, 'consultarAlmMenuIdControlador']);
    Route::get('paci', [PedAlmMenuPaciControlador::class, 'consultarMenuDiaControlador']);
    Route::get('read/{id}',[PedAlmMenuPaciControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('delete/{idMenuSeleccionadoPaci}', [PedAlmMenuPaciControlador::class, 'eliminarAlmTipoControlador']);
});

// registrar pedido de Dieta Paciente
Route::prefix('frmPedEdit',function(){
    Route::get('read/{id}',[PedAlmMenuControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('delete/{idMenuSeleccionado}', [PedAlmMenuControlador::class, 'eliminarAlmTipoControlador']);
});

// registrar Roles del sistema
Route::prefix('frmRol',function(){
    Route::post('create',[RolControlador::class, "registrarRolControlador"]);
    Route::get('read',[RolControlador::class, "consultarRolControlador"]);
    Route::put('update/{idRol}',[RolControlador::class, "actualizarRolControlador"]);
    Route::delete('delete/{idRol}', [RolControlador::class, "eliminarRolControlador"]);
});

// ceracion de usuarios para el sistema
Route::prefix('frmUser',function(){
    Route::post('create',[UsuarioControlador::class, "registrarUsuarioControlador"]);
    Route::get('read',[UsuarioControlador::class, "consultarUsuarioControlador"]);
    Route::put('update/{idUsuario}',[UsuarioControlador::class, "actualizarUsuarioControlador"]);
    Route::delete('delete/{idUsuario}',[UsuarioControlador::class, "eliminarUsuarioControlador"]);
});

// creacion de empleados
Route::prefix('frmEmpl',function(){
    Route::post('create',[PersonaControlador::class, "registrarPersonaControlador"]);
    Route::get('read',[PersonaControlador::class, "consultarPersonaControlador"]);
    Route::put('update/{idPersona}',[PersonaControlador::class, "actualizarPersonaControlador"]);
    Route::delete('delete/{idPersona}',[PersonaControlador::class, "eliminarPersonaControlador"]);
    Route::post('upload',[PersonaControlador::class, "uploadControlador"]);
});

Route::prefix('frmPaci',function(){
    Route::post('create',[PacienteControlador::class, "registrarPacienteControlador"]);
    Route::get('read',[PacienteControlador::class, "consultarPacienteControlador"]);
    Route::put('update/{idPaciente}',[PacienteControlador::class, "actualizarPacienteControlador"]);
    Route::delete('delete/{idPaciente}',[PacienteControlador::class, "eliminarPacienteControlador"]);
    Route::post('upload',[PacienteControlador::class, "uploadControlador"]);
});

