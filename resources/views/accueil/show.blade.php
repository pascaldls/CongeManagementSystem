@extends('layouts.app')

@section( 'title', 'Accueil ')
@section('content')

<h1> Bienvenue </h1>
<h2> {{$employee->nom}} : {{$employee->statut == 0 ? 'Employee' : 'Admin' }} </h2>

@if( ! is_null($conges)> 0)
<h3> Mes congés <a href="/conge/{{$employee->id}}" class="btn btn-primary float-right">Demande de congé </a> </h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th> Début </th>
            <th> Fin </th>
            <th> Statut </th>
            <th> Commentaire </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conges as $conge)
        <tr>
            <td> {{$conge->debut}}</td>
            <td> {{$conge->fin}}</td>
            <td> {{$conge->statut}}</td>
            <td> {{$conge->commentaire}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if( ! is_null($employeesAttente) && count( $employeesAttente ) > 0 )
<h3> Conge a approver </h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th> Nom </th>
            <th> Debut </th>
            <th> Fin </th>
            <th> Commentaire </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employeesAttente as $conge)
        <tr>
            <td> {{$conge->employee->nom}}</td>
            <td> {{$conge->debut->format('d/m/Y')}}</td>
            <td> {{$conge->fin->format('d/m/Y')}}</td>
            <td> {{$conge->commentaire}}</td>
            <td>
                <a href="/conge/approver/{{$conge->id}}" class="btn btn-success mb-1"> Approuver </a>
                <br>
                <a href="/conge/refuser/{{$conge->id}}" class="btn btn-danger"> Refuser </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if( ! is_null($employees) && count( $employees ) > 0 )
<h3> Employées </h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th> Nom </th>
            <th> Statut </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $em)
        <tr onclick="window.location='/{{$em->id}}';">
            <td> {{$em->nom}} </td>
            <td> {{$em->statut == 0 ? 'Employee' : 'Admin' }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
