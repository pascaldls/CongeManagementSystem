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

    public function xtestListCongesDemandes ()
    {
        $employee = factory( Employee::class )->create() ;
        $conges = factory( Conge::class , 12 )->create( [ 'employee_id' =>  $employee->id ] ) ;

        $response = $this->get('/' . $employee->id );
        $response->assertStatus(200);
    }
}
