<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Conge;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        Employee::firstOrCreate([
            'nom'  => 'John doe',
            'statut' => 1
        ]);

        Employee::firstOrCreate([
            'nom'  => 'Jane doe',
            'statut' => 0
        ]);
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

        $employee = factory( Employee::class )->create([
            'statut' => 0
        ]) ;

        $conges = factory( Conge::class , 12 )->create( [ 'employee_id' =>  $employee->id ] ) ;

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
    }
}
