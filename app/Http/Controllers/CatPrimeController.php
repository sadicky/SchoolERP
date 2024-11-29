<?php

namespace App\Http\Controllers;

use App\Models\CatPrime;
use App\Http\Requests\StoreCatPrimeRequest;
use App\Http\Requests\UpdateCatPrimeRequest;

class CatPrimeController extends Controller
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
    public function store(StoreCatPrimeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CatPrime $catPrime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatPrime $catPrime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatPrimeRequest $request, CatPrime $catPrime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatPrime $catPrime)
    {
        //
    }
}
