<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return view('admin.form.index', compact('formations'));
        
    }

    public function showPublic()
{
    $formations = Formation::all();
    return view('menus.formation', compact('formations'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
        ]);
    
        Formation::create($request->all());
    
        return redirect()->route('admin.form.index')->with('success', 'Formation créée avec succès.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $formation = Formation::findOrFail($id); 
        return view('menus.show', compact('formation'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return view('admin.form.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
        ]);

        $formation->update($request->all());
        return redirect()->route('admin.form.index')->with('success', 'Formation mise à jour avec succès.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('admin.form.index')->with('success', 'Formation supprimée avec succès.');
    
    }

    public function register(Request $request, Formation $formation) {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour vous inscrire à une formation.');
        }
    
        Inscription::create([
            'user_id' => Auth::id(),
            'formation_id' => $formation->id,
        ]);
    
        return redirect()->route('menus.formation')->with('success', 'Inscription à la formation réussie.');
    }
}
