@extends ('sommaire') 
@section('contenu1')

<div id="contenu">
    <form action="{{ route('ajout.visiteur') }}" method="post">
            @csrf

            <div class="corpsForm">
                    <legend>Veuillez écrire les informations du visiteur :</legend>

                    <p>

                    <label for="Id">Id :</label>
                    <input type="text" name="id" value="">

                    <div>
                        <label for="Nom">Nom :</label>
                        <input type="text" id="Nom" name="nom" value="">
                    </div>

                    <br>

                    <div>
                        <label for="Nom">Prénom :</label>
                        <input type="text" id="Prenom" name="prenom" value="">
                    </div>

                    <br>

                    <div>
                        <label for="Adresse">Adresse :</label>
                        <input type="text" id="Adresse" name="adresse" value="">
                    </div>

                    <br>

                    <div>
                        <label for="CodePostal">Code Postal :</label>
                        <input type="text" id="CodePostal" name="cp" value="">
                    </div>

                    <br>

                    <div>
                        <label for="Ville">Ville :</label>
                        <input type="text" id="Ville" name="ville" value="">
                    </div>

                    <br>

                    <div>
                        <label for="DateEmbauche">Date d'embauche :</label>
                        <input type="text" id="DateEmbauche" name="dateEmbauche" value="">
                    </div>
                    </p>
            </div>
            <div class="piedForm">
            <button type="submit">Valider</button>
            <a href="{{ route('listevisiteur') }}"><button type="button">Annuler</button></a>
        </div>
    </form>
</div>
        
@endsection

