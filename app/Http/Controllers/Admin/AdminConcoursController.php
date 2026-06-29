<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminConcoursController extends Controller
{
    public function show(Concours $concours)
    {
        $concours->load(['cycle', 'filiere', 'specialite', 'pays', 'region', 'departement', 'arrondissement']);

        return view('admin.concours.show', compact('concours'));
    }

    public function edit(Concours $concours)
    {
        return view('admin.concours.edit', compact('concours'));
    }

    public function update(Request $request, Concours $concours)
    {
        $data = $request->validate([
            'numero_recu' => ['nullable', 'string', 'max:255'],
            'numero_candidat' => ['nullable', 'string', 'max:255'],
            'nom_complet' => ['required', 'string', 'max:255'],
            'date_naissance' => ['nullable', 'date'],
            'lieu_naissance' => ['nullable', 'string', 'max:255'],
            'numero_nci' => ['nullable', 'string', 'max:255'],
            'sexe' => ['nullable', 'string', 'max:50'],
            'telephone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'centre_examen' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'handicape' => ['nullable', 'string', 'max:20'],
            'type_handicap' => ['nullable', 'string', 'max:255'],
            'photo_etudiant' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'document_scanner' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ]);

        if ($request->hasFile('photo_etudiant')) {
            if ($concours->photo_etudiant && !str_starts_with($concours->photo_etudiant, 'http')) {
                Storage::disk('public')->delete($concours->photo_etudiant);
            }

            $data['photo_etudiant'] = $request->file('photo_etudiant')
                ->store('concours/photos', 'public');
        }

        if ($request->hasFile('document_scanner')) {
            if ($concours->document_scanner && !str_starts_with($concours->document_scanner, 'http')) {
                Storage::disk('public')->delete($concours->document_scanner);
            }

            $data['document_scanner'] = $request->file('document_scanner')
                ->store('concours/documents', 'public');
        }

        $data['admin_edited_by'] = auth()->id();
        $data['admin_edited_at'] = now();

        // L'admin peut modifier plusieurs fois : aucun blocage ici.
        $concours->update($data);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Inscription modifiée avec succès.');
    }
}