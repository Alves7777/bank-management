<?php

namespace App\Http\Controllers;

use App\Models\Account\Account;
use App\Services\Account\AccountService;
use App\Http\Requests\Account\StoreAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountWebController extends Controller
{
    private AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index(): View
    {
        $accounts = Account::all(); // Pode ser substituído por service se houver método
        return view('accounts.index', compact('accounts'));
    }

    public function create(): View
    {
        return view('accounts.create');
    }

    public function store(StoreAccountRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->accountService->create($validated);
        return redirect()->route('accounts.index')->with('success', 'Conta criada com sucesso!');
    }

    public function edit(Account $account): View
    {
        return view('accounts.edit', compact('account'));
    }

    public function update(UpdateAccountRequest $request, Account $account): RedirectResponse
    {
        $validated = $request->validated();
        $account->update($validated); // Pode ser substituído por service se houver método
        return redirect()->route('accounts.index')->with('success', 'Conta atualizada com sucesso!');
    }

    public function destroy(Account $account): RedirectResponse
    {
        $account->delete(); // Pode ser substituído por service se houver método
        return redirect()->route('accounts.index')->with('success', 'Conta excluída com sucesso!');
    }
}
