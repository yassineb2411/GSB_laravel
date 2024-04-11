@extends ('sommaire') 
@section('contenu1')

<div id="contenu">
    <form action="{{ route('updateTraitement') }}" method="post">
            @csrf
            <div class="corpsForm">
                    <legend>Veuillez écrire les informations du visiteur :</legend>

                    <p>

                    <!-- Champ caché pour l'ID du visiteur -->
                    <input type="hidden" name="id" value="{{ $visiteur['id'] }}">

                    <div>
                        <label for="Nom">Nom</label>
                        <input type="text" id="Nom" name="nom" value="{{ $visiteur['nom'] }}">
                    </div>

                    <br>

                    <div>
                        <label for="Nom">Prénom</label>
                        <input type="text" id="Prenom" name="prenom" value="{{ $visiteur['prenom'] }}">
                    </div>

                    <br>

                    <div>
                        <label for="Adresse">Adresse</label>
                        <input type="text" id="Adresse" name="adresse" value="{{ $visiteur['adresse'] }}">
                    </div>

                    <br>

                    <div>
                        <label for="CodePostal">Code Postal</label>
                        <input type="text" id="CodePostal" name="codePostal" value="{{ $visiteur['cp'] }}">
                    </div>

                    <br>

                    <div>
                        <label for="Ville">Ville</label>
                        <input type="text" id="Ville" name="ville" value="{{ $visiteur['ville'] }}">
                    </div>

                    <br>

                    <div>
                        <label for="DateEmbauche">Date d'embauche</label>
                        <input type="text" id="DateEmbauche" name="dateEmbauche" value="{{ $visiteur['dateEmbauche'] }}">
                    </div>
                    </p>
            </div>
            <div class="piedForm">
            <button type="submit">Valider</button>
            <button>Annuler</button>
            </div>
    </form>
</div>
        
@endsection
