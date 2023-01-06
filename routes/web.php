<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MentionController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\EtudaintController;
use App\Http\Controllers\Backend\FormationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    // formations
    // Route::prefix('formation')->group(function(){
    Route::get('/formations',[FormationController::class,'index'])->name('formation.index');
    Route::get('/creer_formation',[FormationController::class,'create'])->name('formation.create');
    Route::post('/store/formation',[FormationController::class,'store'])->name('formation.store');
    Route::get('/edit_formation/{id}',[FormationController::class,'edit'])->name('formation.edit');
    Route::post('/update_formation/{id}',[FormationController::class,'update'])->name('formation.update');
    Route::delete('/delete_formation/{id}',[FormationController::class, 'destroy'])->name('formation.delete');
    // });
    //etudiands
    Route::get('/etudiants',[EtudaintController::class,'index'])->name('etudiants.index');
    Route::get('/creer_etudiant',[EtudaintController::class,'create'])->name('etudiants.create');
    Route::post('/store/etudiant',[EtudaintController::class,'store'])->name('etudiants.store');
    Route::get('/edit_etudiant/{id}',[EtudaintController::class,'edit'])->name('etudiants.edit');
    Route::post('/update_etudiant/{id}',[EtudaintController::class,'update'])->name('etudiants.update');
    Route::delete('/delete_etudiant/{id}',[EtudaintController::class, 'destroy'])->name('etudiants.delete');

    //mentions
    Route::get('/mentions',[MentionController::class,'index'])->name('mentions.index');
    Route::get('/creer_mentions',[MentionController::class,'create'])->name('mentions.create');
    Route::post('/store/mentions',[MentionController::class,'store'])->name('mentions.store');
    Route::get('/edit_mention/{id}',[MentionController::class,'edit'])->name('mentions.edit');
    Route::post('/update_mention/{id}',[MentionController::class,'update'])->name('mentions.update');
    Route::delete('/delete_mention/{id}',[MentionController::class, 'destroy'])->name('mentions.delete');

    //sections
    Route::get('sections',[SectionController::class,'index'])->name('sections.index');
    Route::get('/creer_sections',[SectionController::class,'create'])->name('sections.create');
    Route::post('/store/sections',[SectionController::class,'store'])->name('sections.store');
    Route::get('/edit_section/{id}',[SectionController::class,'edit'])->name('sections.edit');
    Route::post('/update_section/{id}',[SectionController::class,'update'])->name('sections.update');
    Route::delete('/delete_section/{id}',[SectionController::class, 'destroy'])->name('sections.delete');

    //verifier diplome
    Route::get('/localhost_Academy/verifier_diplome/{id}',[EtudaintController::class,'verification'])->name('auth.diplome');

    // download image
    Route::get('/download_image_code_qr/{id}',[EtudaintController::class,'downloadf'])->name('download');

}) ;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

