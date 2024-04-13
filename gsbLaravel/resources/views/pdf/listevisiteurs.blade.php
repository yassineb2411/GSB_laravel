<!DOCTYPE html>
<html>
<head>
<style>
h1{
    text-align: center;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Liste des visiteurs</h1>

<table id="customers">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date d'embauche</th>
    </tr>
    @if(count($lesVisiteurs))
        @foreach($lesVisiteurs as $unVisiteur)
            <tr>
                <td>{{$unVisiteur['nom']}}</td>
                <td>{{$unVisiteur['prenom']}}</td>
                <td>{{$unVisiteur['dateEmbauche']}}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">No users found</td>
        </tr>
    @endif
</table>

</body>
</html>
