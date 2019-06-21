<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Conge;
use Illuminate\Support\Carbon;
use App\Employee;

class AccueilTest extends TestCase
{
    use RefreshDatabase;

    public function testPageAccueil ()
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/');
        $response->assertStatus(200);

    }

    public function testListCongesDemandesNonAdmin ()
    {
        $employee = factory( Employee::class )->create([
            'statut' => 0
        ]) ;

        $conges = factory( Conge::class , 12 )->create( [ 'employee_id' =>  $employee->id ] ) ;

        $response = $this->get('/' . $employee->id );
        $response->assertStatus(200);

        $content = $response->getOriginalContent()->getData() ;

        $this->assertEquals( $employee->toArray(), $content['employee']->toArray() ) ;

        $this->assertEquals($conges->toArray(), $content['conges']->toArray() ) ;

        $this->assertNull( $content['employeesApprouve'] ) ;
        $this->assertNull( $content['employeesAttente'] ) ;
    }

    public function testListCongesDemandesAdmin ()
    {
        $admin = factory( Employee::class )->create([
            'statut' => 1
        ]) ;
        $congesAdmin = factory( Conge::class , 3 )->create( [
            'employee_id' =>  $admin->id,
            'statut' => 'demande en attente'
        ] ) ;

        $employee = factory( Employee::class )->create( ) ;
        $conges = factory( Conge::class , 1 )->create( [
            'employee_id' =>  $employee->id,
            'statut' => 'demande en attente'
        ] ) ;
        $employee = factory( Employee::class )->create( ) ;
        $employee = factory( Employee::class )->create( ) ;
        $employee = factory( Employee::class )->create( ) ;
        $conges = factory( Conge::class , 3 )->create( [
            'employee_id' =>  $employee->id,
            'statut' => 'demande en attente'
        ] ) ;

        $employee = factory( Employee::class )->create( ) ;
        $conges = factory( Conge::class , 1 )->create( [
            'employee_id' =>  $employee->id,
            'statut' => 'congé approuvé'
        ] ) ;
        $employee = factory( Employee::class )->create( ) ;
        $employee = factory( Employee::class )->create( ) ;
        $employee = factory( Employee::class )->create( ) ;
        $conges = factory( Conge::class , 2 )->create( [
            'employee_id' =>  $employee->id,
            'statut' => 'congé approuvé'
        ] ) ;

        $response = $this->get('/' . $admin->id );
        $response->assertStatus(200);

        $content = $response->getOriginalContent()->getData() ;

        $this->assertEquals( $admin->toArray(), $content['employee']->toArray() ) ;

        $this->assertEquals($congesAdmin->toArray(), $content['conges']->toArray() ) ;

        $this->assertNotNull( $content['employeesApprouve'] ) ;
        $this->assertNotNull( $content['employeesAttente'] ) ;

        $this->assertCount(2, $content['employeesApprouve'] );
        $this->assertCount(3, $content['employeesAttente'] );
    }
}
