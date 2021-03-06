<?php

namespace App\Http\Controllers;

use App\Conge;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Validation\Validator;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @param  employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        return view('conge.create', compact('employee'));
    }

    public function validateRequest()
    {
        return  request()->validate(
            [
                'employee_id' => 'required',
                'debut' => 'required',
                'fin' => 'required',
                'commentaire' => 'required'
            ],
            [],
            [
                'employee_id' => 'employe',
                'debut' => 'date début',
                'fin' => 'date fin',
                'commentaire' => 'commentaire'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_merge($this->validateRequest(), ['statut' => 'demande en attente']);

        Conge::create($data);

        return redirect('/' . $data['employee_id'])
            ->with('success', 'Votre congé a bien été déposé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conge  $conge
     * @return \Illuminate\Http\Response
     */
    public function show(Conge $conge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conge  $conge
     * @return \Illuminate\Http\Response
     */
    public function edit(Conge $conge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $action
     * @param  \App\Conge  $conge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $action, Conge $conge)
    {
        $statut = '';
        $approve = 1;
        switch ($action) {
            case 'approver':
                $statut  = 'congé approuvé';
                $approve = 1;
                break;
            case 'refuser':
                $statut  = 'congé refusé';
                break;
        }
        $ok = $conge->update([
            'statut' => $statut
        ]);
        if ($ok) {
            return back()->with('success', ucfirst($statut) . ' ' . $conge->employee->nom);
        } else {
            return back()->with('error', 'Immposible de mettre a jour le congé');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conge  $conge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conge $conge)
    {
        //
    }
}
