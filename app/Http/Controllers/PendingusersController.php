<?php

namespace App\Http\Controllers;

use App\Models\Pendingusers;
use App\Http\Requests\StorePendingusersRequest;
use App\Http\Requests\UpdatePendingusersRequest;

class PendingusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\StorePendingusersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingusersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendingusers  $pendingusers
     * @return \Illuminate\Http\Response
     */
    public function show(Pendingusers $pendingusers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendingusers  $pendingusers
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendingusers $pendingusers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingusersRequest  $request
     * @param  \App\Models\Pendingusers  $pendingusers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingusersRequest $request, Pendingusers $pendingusers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendingusers  $pendingusers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendingusers $pendingusers)
    {
        //
    }
}
