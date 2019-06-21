<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Employee;

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
}
