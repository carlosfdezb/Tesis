<?php

namespace App\Http\Controllers;

use App\ProfesorPie;
use Illuminate\Http\Request;

class ProfesorPieController extends Controller
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
     * @param  \App\ProfesorPie  $profesorPie
     * @return \Illuminate\Http\Response
     */
    public function show(ProfesorPie $profesorPie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfesorPie  $profesorPie
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesorPie $profesorPie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfesorPie  $profesorPie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfesorPie $profesorPie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfesorPie  $profesorPie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfesorPie $profesorPie)
    {
        //
    }
}
