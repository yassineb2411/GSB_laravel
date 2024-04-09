<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class gererVisiteursController extends Controller
{
    function listeVisiteurs(){ 
        if( session('visiteur')!= null){    //Sans la session l’insertion du sommaire  
            $visiteur = session('visiteur');    //provoque une erreur 
            $idVisiteur = $visiteur['id']; 
            $lesVisiteurs = PdoGsb::getLesVisiteurs();
            return view('listeVisiteurs')->with('visiteur', $visiteur)->with('lesVisiteurs', $lesVisiteurs);
        } 
        else{ 
            return view('connexion')->with('erreurs',null); 
        } 
    }

    public function edit($id)
    {
        $visiteur = session('visiteur');
        if( session('visiteur') != null){
        $user = PdoGsb::afficherLeVisiteur($id); 
        return view('edit')
            ->with('visiteur', $visiteur)
            ->with('user', $user);
        }
    }

    public function saveEdit(Request $request)
    {   
        if(session('visiteur') != null) {
            $visiteur = session('visiteur');
            $id = $request->input('id'); // Utilisez input() pour récupérer les valeurs du formulaire
            // Récupérez les autres données du formulaire
            // Mettez à jour l'utilisateur avec les nouvelles données
            // Après la mise à jour, récupérez les données mises à jour de l'utilisateur
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $login = PdoGsb::genererLogin($prenom, $nom);
            $adresse = $request->input('adresse');
            $cp = $request->input('cp');
            $ville = $request->input('ville');
            $time = strtotime($request->input('DE'));
            $newformat = date('Y-m-d', $time);
            PdoGsb::majVisiteur($nom, $prenom, $login, $adresse, $cp, $ville, $newformat);
            $user = PdoGsb::afficherLeVisiteur($id); // Récupérez les données de l'utilisateur après la mise à jour

            // Redirigez l'utilisateur vers la page d'édition avec les nouvelles données
            return redirect()->route('chemin_modifier', ['id' => $id])->with('message', 'Les informations ont bien été modifiées.')
                ->with('visiteur', $visiteur)
                ->with('user', $user)
                ->with('method', $request->method());
        } else {
            // Gérez le cas où la session visiteur est nulle
            $message = "";
            return view('edit')
                ->with('visiteur', $visiteur)
                ->with('message', $message)
                ->with('method', $request->method());
        }
    }
}