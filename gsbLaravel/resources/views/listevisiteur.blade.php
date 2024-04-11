@extends ('sommaire') 
@section('contenu1')

    <h3>Liste des visiteurs</h3>
    <div class="encadre">
        <table class="listeLegere">
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
            </tr>
            @foreach($lesVisiteurs as $unVisiteur)
            <tr>
                <td>{{$unVisiteur['nom']}}</td>
                <td>{{$unVisiteur['prenom']}}</td>
                <td><button><a href="{{ route('update', ['id' => $unVisiteur['id']]) }}">Modifier</a></button></td>
                <td><button>supprimer</button></td>
            </tr>
            @endforeach
        </table>
        <button>Ajouter</button>
    </div>

    <style>
        button a {
            text-decoration: none; /* Supprimer le soulignement */
            color: inherit; /* Utiliser la couleur par défaut du texte */
        }
    </style>

@endsection