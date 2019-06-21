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

        $this->assertNull( $content['employees'] ) ;
    }

    public function testListCongesDemandesAdmin ()
    {
        $employee = factory( Employee::class )->create([
            'statut' => 1
        ]) ;

        $conges = factory( Conge::class , 12 )->create( [ 'employee_id' =>  $employee->id ] ) ;

        $response = $this->get('/' . $employee->id );
        $response->assertStatus(200);

        $content = $response->getOriginalContent()->getData() ;

        $this->assertEquals( $employee->toArray(), $content['employee']->toArray() ) ;

        $this->assertEquals($conges->toArray(), $content['conges']->toArray() ) ;

        $this->assertNotNull( $content['employees'] ) ;

        $employees = Employee::all()  ;
        $this->assertEquals($employees->toArray(), $content['employees']->toArray() ) ;
    }
}
