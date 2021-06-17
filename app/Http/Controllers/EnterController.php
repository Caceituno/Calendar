<?php

namespace App\Http\Controllers;

use App\Models\Enter;
use Illuminate\Http\Request;

class EnterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.beginning');
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
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function show(Enter $enter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function edit(Enter $enter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enter $enter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enter  $enter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enter $enter)
    {
        //
    }
}
