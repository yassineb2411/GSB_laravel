<?php

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
        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

        /*-------------------- Use case gérer les visiteurs - listing ---------------------------*/

Route::get('voirVisiteur',[
        'as'=>'chemin_voirVisiteur',
        'uses'=>'gererVisiteurController@voirVisiteur'
]);

        /*-------------------- Use case gérer les visiteurs - modifier ---------------------------*/

Route::get('/update-etudiant/{id}', 'App\Http\Controllers\gererVisiteurController@update_etudiant')->name('update');

Route::post('/update/traitement', 'App\Http\Controllers\gererVisiteurController@updateTraitement')->name('updateTraitement');

Route::get('/listevisiteur', 'App\Http\Controllers\gererVisiteurController@voirVisiteur')->name('listevisiteur');

        /*-------------------- Use case gérer les visiteurs - Ajouter ---------------------------*/

Route::get('/ajout', 'App\Http\Controllers\gererVisiteurController@ajout')->name('ajout');

Route::post('/ajout-visiteur', 'App\Http\Controllers\gererVisiteurController@ajoutVisiteur')->name('ajout.visiteur');

        /*-------------------- Use case gérer les visiteurs - Créer PDF ---------------------------*/

Route::get('/visiteurs/pdf', 'App\Http\Controllers\gererVisiteurController@genererPDF')->name('visiteurs.pdf');






