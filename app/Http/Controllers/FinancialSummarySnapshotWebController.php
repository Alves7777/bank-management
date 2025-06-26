<?php

namespace App\Http\Controllers;

use App\Models\FinancialSummarySnapshot;
use Illuminate\Http\Request;

class FinancialSummarySnapshotWebController extends Controller
{
    public function index()
    {
        $financialSummarySnapshots = FinancialSummarySnapshot::all();
        return view('financial_summary_snapshots.index', compact('financialSummarySnapshots'));
    }

    public function create()
    {
        return view('financial_summary_snapshots.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        FinancialSummarySnapshot::create($validated);
        return redirect()->route('financial_summary_snapshots.index')->with('success', 'Snapshot criada com sucesso!');
    }

    public function edit(FinancialSummarySnapshot $financialSummarySnapshot)
    {
        return view('financial_summary_snapshots.edit', compact('financialSummarySnapshot'));
    }

    public function update(Request $request, FinancialSummarySnapshot $financialSummarySnapshot)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $financialSummarySnapshot->update($validated);
        return redirect()->route('financial_summary_snapshots.index')->with('success', 'Snapshot atualizada com sucesso!');
    }

    public function destroy(FinancialSummarySnapshot $financialSummarySnapshot)
    {
        $financialSummarySnapshot->delete();
        return redirect()->route('financial_summary_snapshots.index')->with('success', 'Snapshot excluída com sucesso!');
    }
}
