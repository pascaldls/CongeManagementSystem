<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Conge;
use App\Employee;

class CongeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Creation Conge En Attente
     *
     * @return void
     */
    public function testCongeEnAttente ()
    {
        $employee = factory( Employee::class )->create() ;

        $debut = '05-12-2019' ;
        $fin = '06-12-2019' ;

        Conge::firstOrCreate([
            'debut'  => $debut,
            'fin' => $fin,
            'employee_id' => $employee->id ,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]);

        $this->assertCount(1, Conge::all());

        $conge = Conge::first();

        $this->assertEquals($employee->id, $conge->employee->id );
        $this->assertEquals( $debut, $conge->debut );
        $this->assertEquals( $fin, $conge->fin );

    }
    /**
     * Creation Conge Approuve
     *
     * @return void
     */
    public function testCongeApprouve ()
    {
        $employee = factory( Employee::class )->create() ;

        $debut = '05-12-2019' ;
        $fin = '06-12-2019' ;

        Conge::firstOrCreate([
            'debut'  => $debut,
            'fin' => $fin,
            'employee_id' => $employee->id ,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]);

        $this->assertCount(1, Conge::all());

        $conge = Conge::first();

        $this->assertEquals( 'demande en attente', $conge->statut );

        $conge->update( [
            'statut' => 'congé approuvé',
        ]) ;

        $conge->refresh() ;

        $this->assertEquals( 'congé approuvé', $conge->statut );

    }
     /**
     * Creation Conge Approuve
     *
     * @return void
     */
    public function testCongeRefuse ()
    {
        $employee = factory( Employee::class )->create() ;

        $debut = '05-12-2019' ;
        $fin = '06-12-2019' ;

        Conge::firstOrCreate([
            'debut'  => $debut,
            'fin' => $fin,
            'employee_id' => $employee->id ,
            'statut' => 'demande en attente',
            'Commentaire' => 'Je part en vacances xxx'
        ]);

        $this->assertCount(1, Conge::all());

        $conge = Conge::first();

        $this->assertEquals( 'demande en attente', $conge->statut );

        $conge->update( [
            'statut' => 'congé refusé',
        ]) ;

        $conge->refresh() ;

        $this->assertEquals( 'congé refusé', $conge->statut );

    }
}
