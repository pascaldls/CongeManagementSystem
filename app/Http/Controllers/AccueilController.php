<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
