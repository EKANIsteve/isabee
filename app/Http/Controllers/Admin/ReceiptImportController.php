<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ValidReceipt;
use Illuminate\Http\Request;

class ReceiptImportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,txt'],
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');

        $header = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($header, $row);

            ValidReceipt::updateOrCreate(
                ['numero_recu' => trim($data['numero_recu'])],
                [
                    'montant' => $data['montant'] ?? null,
                    'date_paiement' => $data['date_paiement'] ?? null,
                    'nom_payeur' => $data['nom_payeur'] ?? null,
                    'status' => 'valide',
                ]
            );
        }

        fclose($file);

        return back()->with('success', 'Reçus officiels importés avec succès.');
    }
}