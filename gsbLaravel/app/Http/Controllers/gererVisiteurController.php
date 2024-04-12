<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
use Dompdf\Dompdf;

class gererVisiteurController extends Controller
{
    function voirVisiteur() {
        if (session()->has('visiteur')) {
            $visiteur = session('visiteur');
            $lesVisiteurs = PdoGsb::afficherVisiteurs();
            //$visiteur = session('visiteur');
            return view('listevisiteur')->with('lesVisiteurs', $lesVisiteurs)->with('visiteur',$visiteur);
        } else {
            return redirect()->route('connexion')->with('erreurs', null);
        }
    }

    public function update_etudiant($id){
        $visiteur = PdoGsb::getVisiteurById($id); // Supposons que vous avez une méthode pour récupérer le visiteur par son ID
        return view('update', compact('visiteur'));
    }
    
    public function updateTraitement(Request $request) {
        // Récupérer l'ID du visiteur à partir de la requête
        $id = $request->input('id');
    
        // Récupérer le visiteur à partir de la base de données
        $visiteur = PdoGsb::getVisiteurById($id);
    
        if ($visiteur !== false) {
            // Mettre à jour les propriétés du visiteur avec les nouvelles données soumises
            $visiteur['nom'] = $request->input('nom');
            $visiteur['prenom'] = $request->input('prenom');
            $visiteur['adresse'] = $request->input('adresse');
            $visiteur['cp'] = $request->input('codePostal');
            $visiteur['ville'] = $request->input('ville');
            $visiteur['dateEmbauche'] = $request->input('dateEmbauche');
    
            // Enregistrer les modifications dans la base de données
            PdoGsb::updateVisiteur($visiteur);
    
            // Rediriger l'utilisateur vers une page de confirmation ou une autre page après la mise à jour
            return redirect()->route('listevisiteur')->with('success', 'Le visiteur a été mis à jour avec succès.');
        } else {
            // Gérer le cas où aucun visiteur avec cet ID n'a été trouvé
            return redirect()->back()->with('error', 'Aucun visiteur trouvé avec cet ID.');
        }
    }
    
    public function ajout(){
        $visiteur = session('visiteur');
        return view('ajout')->with('visiteur',$visiteur);
    }

    public function ajoutVisiteur(Request $request) {
        // Récupérer les données du formulaire
        $id = $request->input('id');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $adresse = $request->input('adresse');
        $cp = $request->input('cp');
        $ville = $request->input('ville');
        $dateEmbauche = $request->input('dateEmbauche');
    
        PdoGsb::ajouterVisiteur($id, $nom, $prenom, $adresse, $cp, $ville, $dateEmbauche);
    
        // Rediriger l'utilisateur vers la liste des visiteurs avec un message de succès
        return redirect()->route('listevisiteur')->with('success', 'Le visiteur a été ajouté avec succès.');
    }

    public function genererPDF()
    {
        $lesVisiteurs = PdoGsb::afficherVisiteurs(); // Renommez la variable ici

        // Créer une instance de Dompdf
        $dompdf = new Dompdf();

        // Charger la vue PDF avec les visiteurs
        $html = view('listevisiteur', compact('lesVisiteurs'))->render(); // Utilisez $lesVisiteurs ici

        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Rendre le PDF
        $dompdf->render();

        // Télécharger le PDF
        return $dompdf->stream('liste_visiteurs.pdf');

        $visiteur = session('visiteur');
        return view('listevisiteur')->with('visiteur',$visiteur);
    }

}