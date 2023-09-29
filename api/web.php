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
use PHP\Controllers\EditAlmMenuControlador;
use PHP\Controllers\PedAlmMenuPaciControlador;

Route::prefix('reporte', function() {
    Route::get("almuerzos", [PedAlmMenuControlador::class, 'generateReport']);
    Route::post("almuerzos", [PedAlmMenuControlador::class, 'generateReportDates']);
});

Route::prefix('frmPed', function() {
    Route::prefix('frmConPedMenu', function() {
        Route::get('leer-menu', [PedAlmMenuControlador::class, 'consultarAlmMenuApartControlador']);
    });
});

Route::get('dias', [AlmDiaControlador::class, 'listarAlmDiaMenuControlador']);

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmTipo', function() {
    Route::post('tipo', [AlmTipoControlador::class, 'registrarAlmTipoControlador']);
    Route::get('tipo', [AlmTipoControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('tipo/{idNutriTipo}', [AlmTipoControlador::class, 'eliminarAlmTipoControlador']);
    Route::put('tipo/{idNutriTipo}', [AlmTipoControlador::class, 'actualizarAlmTipoControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmAcomp', function() {
    Route::post('acomp', [AlmAcompControlador::class, 'registrarAlmACompControlador']);
    Route::get('acomp', [AlmAcompControlador::class, 'consultarAlmACompControlador']);
    Route::delete('acomp/{idNutriAcomp}', [AlmAcompControlador::class, 'eliminarAlmACompControlador']);
    Route::put('acomp/{idNutriAcomp}', [AlmAcompControlador::class, 'actualizarAlmACompControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmArroz', function() {
    Route::post('arroz', [AlmArrozControlador::class, 'registrarAlmArrozControlador']);
    Route::get('arroz', [AlmArrozControlador::class, 'consultarAlmArrozControlador']);
    Route::delete('arroz/{idNutriArroz}', [AlmArrozControlador::class, 'eliminarAlmArrozControlador']);
    Route::put('arroz/{idNutriArroz}', [AlmArrozControlador::class, 'actualizarAlmArrozControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmBebida', function() {
    Route::post('bebida', [AlmBebidaControlador::class, 'registrarAlmBebidaControlador']);
    Route::get('bebida', [AlmBebidaControlador::class, 'consultarAlmBebidaControlador']);
    Route::delete('bebida/{idNutriBebida}', [AlmBebidaControlador::class, 'eliminarAlmBebidaControlador']);
    Route::put('bebida/{idNutriBebida}', [AlmBebidaControlador::class, 'actualizarAlmBebidaControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmProte', function() {
    Route::post('prote', [AlmProteControlador::class, 'registrarAlmTipoControlador']);
    Route::get('prote', [AlmProteControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('prote/{idNutriProte}', [AlmProteControlador::class, 'eliminarAlmProteControlador']);
    Route::put('prote/{idNutriProte}', [AlmProteControlador::class, 'actualizarAlmProteControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmSopa', function() {
    Route::post('sopa', [AlmSopaControlador::class, 'registrarAlmSopaControlador']);
    Route::get('sopa', [AlmSopaControlador::class, 'consultarAlmSopaControlador']);
    Route::delete('sopa/{idNutriSopa}', [AlmSopaControlador::class, 'eliminarAlmSopaControlador']);
    Route::put('sopa/{idNutriSopa}', [AlmSopaControlador::class, 'actualizarAlmSopaControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmEnerge', function() {
    Route::post('energe', [AlmEnergeControlador::class, 'registrarAlmEnergeControlador']);
    Route::get('energe', [AlmEnergeControlador::class, 'consultarAlmEnergeControlador']);
    Route::delete('energe/{idNutriEnerge}', [AlmEnergeControlador::class, 'eliminarAlmEnergeControlador']);
    Route::put('energe/{idNutriEnerge}', [AlmEnergeControlador::class, 'actualizarAlmEnergeControlador']);
});

// YA QUEDO FUNCIONANDO
Route::prefix('frmAlmEnsal', function() {
    Route::post('ensal', [AlmEnsalControlador::class, 'registrarAlmEnsalControlador']);
    Route::get('ensal', [AlmEnsalControlador::class, 'consultarAlmEnsalControlador']);
    Route::delete('ensal/{idNutriEnsal}', [AlmEnsalControlador::class, 'eliminarAlmEnsalControlador']);
    Route::put('ensal/{idNutriEnsal}', [AlmEnsalControlador::class, 'actualizarAlmEnsalControlador']);
});

Route::prefix('frmAlmMenu', function(){
    Route::post('menu', [AlmMenuControlador::class, 'registrarAlmTipoControlador']);
    Route::get('menu', [AlmMenuControlador::class, 'consultarAlmMenuControlador']);
    // Route::delete('menu/{idNutriMenu}', [AlmMenuControlador::class, 'eliminarAlmEnsalControlador']);
    // Route::put('menu/{idNutriMenu}', [AlmMenuControlador::class, 'actualizarAlmEnsalControlador']);
});

Route::prefix('frmPedPaci', function(){
    Route::post('paci', [PedAlmMenuPaciControlador::class, 'procesarFormulario']);
    Route::get('paci/{idPaciente}',[PedAlmMenuPaciControlador::class, 'consultarAlmMenuIdControlador']);
    Route::get('paci', [PedAlmMenuPaciControlador::class, 'consultarMenuDiaControlador']);
    //Route::post('paciMenu', [PedAlmMenuPaciControlador::class, 'registrarMenuDiaControlador']);
    Route::get('read/{id}',[PedAlmMenuPaciControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('delete/{idMenuSeleccionadoPaci}', [PedAlmMenuPaciControlador::class, 'eliminarAlmTipoControlador']);
});

Route::prefix('frmPedEdit',function(){
    Route::get('read/{id}',[PedAlmMenuControlador::class, 'consultarAlmTipoControlador']);
    Route::delete('delete/{idMenuSeleccionado}', [PedAlmMenuControlador::class, 'eliminarAlmTipoControlador']);
});

