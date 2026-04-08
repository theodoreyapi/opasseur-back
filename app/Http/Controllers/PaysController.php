<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Communes;
use App\Models\Pays;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pays = Pays::all();
        $paysCount = Pays::count();

        $commune = Communes::join('pays', 'communes.pays_id', '=', 'pays.id_pays')->get();
        $communeCount = Communes::count();

        return view('pays', compact('pays', 'paysCount', 'commune', 'communeCount'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
