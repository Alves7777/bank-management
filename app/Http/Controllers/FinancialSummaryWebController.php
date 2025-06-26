<?php

namespace App\Http\Controllers;

use App\Models\FinancialSummary;
use Illuminate\Http\Request;

class FinancialSummaryWebController extends Controller
{
    public function index()
    {
        $financialSummaries = FinancialSummary::all();
        return view('financial_summaries.index', compact('financialSummaries'));
    }

    public function create()
    {
        return view('financial_summaries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        FinancialSummary::create($validated);
        return redirect()->route('financial_summaries.index')->with('success', 'Resumo financeiro criado com sucesso!');
    }

    public function edit(FinancialSummary $financialSummary)
    {
        return view('financial_summaries.edit', compact('financialSummary'));
    }

    public function update(Request $request, FinancialSummary $financialSummary)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $financialSummary->update($validated);
        return redirect()->route('financial_summaries.index')->with('success', 'Resumo financeiro atualizado com sucesso!');
    }

    public function destroy(FinancialSummary $financialSummary)
    {
        $financialSummary->delete();
        return redirect()->route('financial_summaries.index')->with('success', 'Resumo financeiro excluído com sucesso!');
    }
}
