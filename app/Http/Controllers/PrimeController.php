<?php

namespace App\Http\Controllers;

use App\Models\Prime;
use App\Http\Requests\StorePrimeRequest;
use App\Http\Requests\UpdatePrimeRequest;

class PrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrimeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prime $prime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prime $prime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrimeRequest $request, Prime $prime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prime $prime)
    {
        //
    }
}
