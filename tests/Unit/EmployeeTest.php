<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Employee;
use App\Conge;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Creation d'un employee admin
     *
     * @return void
     */
    public function testCreationDunEmployeAdmin()
    {
        Employee::firstOrCreate([
            'nom'  => 'John doe',
            'statut' => 1
        ]);

        $this->assertCount(1, Employee::all());
    }

    /**
     * Creation d'un employee pas admin
     *
     * @return void
     */
    public function testCreationDunEmployePasAdmin()
    {
        Employee::firstOrCreate([
            'nom'  => 'Jane doe',
            'statut' => 0
        ]);

        $this->assertCount(1, Employee::all());
    }

    public function testEmployeAvecCongeEnAttante()
    {
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

        $employees = Employee::whereHas( 'conges', function ($query){
            $query->where( 'statut', 'demande en attente') ;
        })->get() ;

        $this->assertCount(2, $employees );
    }


    public function testEmployeAvecCongeApprouve()
    {
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

        $employees = Employee::whereHas( 'conges', function ($query){
            $query->where( 'statut', 'congé approuvé') ;
        })->get() ;

        $this->assertCount(2, $employees );
    }
}
