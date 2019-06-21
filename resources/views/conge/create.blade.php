@extends('layouts.app')

@section( 'title', 'Demande de congé')
@section('content')

<h1> Demande de congé : {{$employee->nom}} </h1>

{!! Form::open([
'action' => ['CongeController@store', ''],
'method'=>'POST', 'files' =>true
] ) !!}

<div class="form-group row">
    {{ Form::label('debut', 'Date Début', [ 'class'=> 'col-sm-2 col-form-label' ] ) }}
    <datepicker :name="'debut'" :value="'{{old('debut') ?? "" }}'" :format="'yyyy-MM-dd'"
        :input-class="'col-sm-10 col-form-label'"></datepicker>
</div>
<div class="form-group row">
    {{ Form::label('fin', 'Date Fin', [ 'class'=> 'col-sm-2 col-form-label' ]) }}
    <datepicker :name="'fin'" :value="'{{old('fin') ?? "" }}'" :format="'yyyy-MM-dd'"
        :input-class="'col-sm-10 col-form-label'"></datepicker>
</div>
<div class="form-group row">
    {{ Form::label('commentaire', 'Commentaire', [ 'class'=> 'col-sm-2 col-form-label' ]) }}
    {{ Form::textArea('commentaire', old('commentaire') ?? '', ['class'=>'form-control col-sm-10', 'placeholder'=>'']) }}
</div>

{{ Form::hidden('employee_id', $employee->id ) }}
<div class="form-group row">
    <div class="col-sm-8 col offset-sm-2">
        {{ Form::submit('Soumettre', ['class' => 'btn btn-primary' ]) }}
    </div>
</div>
{!! Form::close() !!}
@endsection
