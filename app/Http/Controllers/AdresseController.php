<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAdresses = Adresse::where('user_id', auth()->id())->get();
        return view('adresses.index', compact('userAdresses'));

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
        $validatedData = $request->validate([
            'numero_de_rue' => 'required',
            'rue' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
        ]);

        $adresse = new Adresse();
        $adresse->fill($validatedData);
        $adresse->user_id = auth()->id();
        $adresse->save();

        return redirect(route('adresses'));

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
        $adresse = Adresse::findOrFail($id);
        return view('pages.edit', compact('adresse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'numero_de_rue' => 'required',
            'rue' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
        ]);

        $adresse = Adresse::findOrFail($id);
        $adresse->update($validatedData);
        return redirect(route('adresses'))->with('success', 'Adresse mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adresse = Adresse::findOrFail($id);
        $adresse->delete();

        return redirect(route('dashboard'));
    }
}
