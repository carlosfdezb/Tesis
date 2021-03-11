<?php

namespace App\Http\Controllers;

use App\AsignaturaPie;
use Illuminate\Http\Request;

class AsignaturaPieController extends Controller
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
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function show(AsignaturaPie $asignaturaPie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignaturaPie $asignaturaPie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignaturaPie $asignaturaPie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignaturaPie  $asignaturaPie
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsignaturaPie $asignaturaPie)
    {
        //
    }
}
