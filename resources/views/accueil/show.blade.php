@extends('layouts.app')

@section( 'title', 'Accueil ') ;
@section('content')

<h1> Accueil </h1>

    <table class="table table-striped table-bordered table-hover">

        <tbody>

            <tr>
                foreach ($ids as $id) {

                    echo '<td>'.$id.'</td>';

                }
            </tr>

            <tr>
                foreach ($employeee as $employee) {

                    echo '<td>'.$employee.'</td>';

                }
            </tr>

            <tr>
                foreach ($employeess as $employees) {

                    echo '<td>'.$employees.'</td>';

                }
            </tr>

            <tr>
                foreach ($congees as $conges) {

                    echo '<td>'.$conges.'</td>';

                }
            </tr>

        </tbody>

    </table>
@endsection

