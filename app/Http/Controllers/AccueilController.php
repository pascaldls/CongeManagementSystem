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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( employee $employee)
    {
        // $employee = Employee::find( $id ) ;

        $conges = Conge::where( 'employee_id', $employee->id )->get() ;

        $employees = null ;
        if ( $employee->statut == 1 ) {
            $employees = Employee::all() ;
        }

        return view('accueil.show')->with( compact( 'employee', 'employees', 'conges' ) );
    }
}
