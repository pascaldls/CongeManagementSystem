@extends('layouts.app')

@section( 'title', 'Accueil ')
@section('content')

<h1> Bienvenue </h1>
<h2> {{$employee->nom}} : {{$employee->statut == 0 ? 'Employee' : 'Admin' }} </h2>

@if( ! is_null($conges)> 0)
<h3> Mes conge <a href="/conge/{{$employee->id}}" class="btn btn-primary float-right">Demande de conge</a> </h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th> Debut </th>
            <th> Fin </th>
            <th> Statut </th>
            <th> commentaire </th>
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
            <td> {{$conge->debut}}</td>
            <td> {{$conge->fin}}</td>
            <td> {{$conge->commentaire}}</td>
            <td> <button> Approuver </button> <button> Refuser </button> </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if( ! is_null($employees) && count( $employees ) > 0 )
<h3> Employees </h3>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th> Nom </th>
            <th> Statut </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $em)
        <tr>
            <a href="">
                <td> {{$em->nom}}</td>
                <td> {{$em->statut == 0 ? 'Employee' : 'Admin' }} </td>
            </a>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
