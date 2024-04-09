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
                <td>
                    {{-- <a href="{{ url('edit/'.$unVisiteur['id']) }}" class="btn btn-success">Edit</a> --}}

                    <form action="{{ route('chemin_modifier', ['id' => $unVisiteur['id']]) }}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$unVisiteur['id']}}">
                        <button type="submit" name="submit">Modifier</button>
                    </form>
                </td>
                <td><button>Supprimer</button></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection