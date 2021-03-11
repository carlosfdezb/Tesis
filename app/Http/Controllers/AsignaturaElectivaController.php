<?php

namespace App\Http\Controllers;

use App\AsignaturaElectiva;
use Illuminate\Http\Request;

class AsignaturaElectivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsignaturaElectiva  $asignaturaElectiva
     * @return \Illuminate\Http\Response
     */
    public function show(AsignaturaElectiva $asignaturaElectiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignaturaElectiva  $asignaturaElectiva
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignaturaElectiva $asignaturaElectiva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignaturaElectiva  $asignaturaElectiva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignaturaElectiva $asignaturaElectiva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignaturaElectiva  $asignaturaElectiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsignaturaElectiva $asignaturaElectiva)
    {
        //
    }
}
