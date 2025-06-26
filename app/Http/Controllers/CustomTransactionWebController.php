<?php

namespace App\Http\Controllers;

use App\Models\CustomTransaction;
use Illuminate\Http\Request;

class CustomTransactionWebController extends Controller
{
    public function index()
    {
        $customTransactions = CustomTransaction::all();
        return view('custom_transactions.index', compact('customTransactions'));
    }

    public function create()
    {
        return view('custom_transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        CustomTransaction::create($validated);
        return redirect()->route('custom_transactions.index')->with('success', 'Transação customizada criada com sucesso!');
    }

    public function edit(CustomTransaction $customTransaction)
    {
        return view('custom_transactions.edit', compact('customTransaction'));
    }

    public function update(Request $request, CustomTransaction $customTransaction)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $customTransaction->update($validated);
        return redirect()->route('custom_transactions.index')->with('success', 'Transação customizada atualizada com sucesso!');
    }

    public function destroy(CustomTransaction $customTransaction)
    {
        $customTransaction->delete();
        return redirect()->route('custom_transactions.index')->with('success', 'Transação customizada excluída com sucesso!');
    }
}
