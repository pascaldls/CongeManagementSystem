<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Conge;
use Illuminate\Support\Carbon;
use App\Employee;

class DemandeCongeTest extends TestCase
{
    use RefreshDatabase;

    public function testFormulaireDemandeDeConge ()
    {

        $employee = factory( Employee::class )->create( ) ;

        // $this->withoutExceptionHandling();
        $response = $this->get( '/conge/'. $employee->id  ) ;

        $response->assertStatus(200);

    }
    public function testPostDemandeDeConge ()
    {

        $this->withoutExceptionHandling();

        $employee = factory( Employee::class )->create( ) ;

        $debut = '2019-12-05' ;
        $fin = '2019-12-09' ;

        // $this->withoutExceptionHandling();
        $response = $this->post( '/conge', [
            'employee_id' => $employee->id,
            'debut'  => $debut,
            'fin' => $fin,
            'employee_id' => $employee->id ,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]) ;

        $response->assertStatus(302);
        $response->assertRedirect('/'. $employee->id );

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success', 'Conge a ete deposer');

        $this->assertCount(1, Conge::all());

        $conge = Conge::first();

        $this->assertEquals($employee->id, $conge->employee->id );
        $this->assertEquals( $debut, $conge->debut->format('Y-m-d') );
        $this->assertEquals( $fin, $conge->fin->format('Y-m-d') );
    }

    public function testPostDemandeDeCongeInvalid ()
    {
        $employee = factory( Employee::class )->create( ) ;
        $debut = '2019-12-05' ;
        $fin = '2019-12-09' ;

        // $this->withoutExceptionHandling();
        $response = $this->post( '/conge', [
            'debut'  => $debut,
            'fin' => $fin,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]) ;
        $response->assertStatus(302);
        $response->assertSessionHasErrors();


        $response = $this->post( '/conge', [
            'employee_id' => $employee->id,
            'fin' => $fin,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]) ;
        $response->assertStatus(302);
        $response->assertSessionHasErrors();


        $response = $this->post( '/conge', [
            'employee_id' => $employee->id,
            'debut'  => $debut,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]) ;
        $response->assertStatus(302);
        $response->assertSessionHasErrors();


        $response = $this->post( '/conge', [
            'employee_id' => $employee->id,
            'debut'  => $debut,
            'fin' => $fin,
            'Commentaire' => 'Je part en vacances xxx'
        ]) ;
        $response->assertStatus(302);
        $response->assertSessionHasErrors();


        $response = $this->post( '/conge', [
            'employee_id' => $employee->id,
            'debut'  => $debut,
            'fin' => $fin,
            'statut' => 'demande en attente',
        ]) ;
        $response->assertStatus(302);
        $response->assertSessionHasErrors();


    }


}
