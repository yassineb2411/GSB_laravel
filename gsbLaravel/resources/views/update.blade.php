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
                        <input type="text" id="Nom" name="nom" value="{{ $visiteur['nom'] }}" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')" pattern="[A-Za-z]+" required>
                    </div>

                    <br>

                    <div>
                        <label for="Nom">Prénom</label>
                        <input type="text" id="Prenom" name="prenom" value="{{ $visiteur['prenom'] }}" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')" pattern="[A-Za-z]+" required>
                    </div>

                    <br>

                    <div>
                        <label for="Adresse">Adresse</label>
                        <input type="text" id="Adresse" name="adresse" value="{{ $visiteur['adresse'] }}" required>
                    </div>

                    <br>

                    <div>
                        <label for="CodePostal">Code Postal</label>
                        <input type="number" id="CodePostal" name="codePostal" value="{{ $visiteur['cp'] }}" placeholder="exemple = 94600" required>
                    </div>

                    <br>

                    <div>
                        <label for="Ville">Ville</label>
                        <input type="text" id="Ville" name="ville" value="{{ $visiteur['ville'] }}" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')" pattern="[A-Za-z]+" required>
                    </div>

                    <br>

                    <div>
                        <label for="DateEmbauche">Date d'embauche</label>
                        <input type="text" id="DateEmbauche" name="dateEmbauche" value="{{ $visiteur['dateEmbauche'] }}" placeholder="AAAA/MM/JJ" required>
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
