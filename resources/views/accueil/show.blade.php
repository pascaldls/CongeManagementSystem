@extends('layouts.app')

@section( 'title', 'Accueil ') ;
@section('content')

<h1> Accueil </h1>

    <h3> Conge </h3>
    <table class="table table-striped table-bordered table-hover">
        <tbody>

            @foreach ($conges as $conges)
            <tr>
            <td> {{}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

'employee', 'conges', 'employeesApprouve', 'employeesAttente'
