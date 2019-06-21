<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conge;
use App\Employee;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accueil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show( employee $employee)
    {
        // $employee = Employee::find( $id ) ;

        $conges = Conge::where( 'employee_id', $employee->id )->get() ;

        $employeesApprouve = null ;
        $employeesAttente = null ;
        if ( $employee->statut == 1 ) {
            $employeesAttente = Employee::whereHas( 'conges', function ($query){
                $query->where( 'statut', 'demande en attente') ;
            })->get() ;
            $employeesApprouve = Employee::whereHas( 'conges', function ($query){
                $query->where( 'statut', 'congé approuvé') ;
            })->get() ; ;
        }

        return view('accueil.show')->with( compact( 'employee', 'conges', 'employeesApprouve', 'employeesAttente'  ) );
    }
}
