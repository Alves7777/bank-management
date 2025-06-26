<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\AccountWebController;
use App\Http\Controllers\TransactionWebController;
use App\Http\Controllers\BillWebController;
use App\Http\Controllers\CustomTransactionWebController;
use App\Http\Controllers\FinancialSummaryWebController;
use App\Http\Controllers\FinancialSummarySnapshotWebController;

Route::get('/dashboard', function () {
    $categoriesCount = \App\Models\Category::count();
    return view('dashboard', compact('categoriesCount'));
})->name('dashboard');

// Remover rota resource padrão para evitar erro de método show ausente
// Route::resource('categories', CategoryWebController::class);

// Rotas explícitas para evitar erro de método ausente
Route::get('categories', [App\Http\Controllers\CategoryWebController::class, 'index'])->name('categories.index');
Route::get('categories/create', [App\Http\Controllers\CategoryWebController::class, 'create'])->name('categories.create');
Route::post('categories', [App\Http\Controllers\CategoryWebController::class, 'store'])->name('categories.store');
Route::get('categories/{id}/edit', [App\Http\Controllers\CategoryWebController::class, 'edit'])->name('categories.edit');
Route::put('categories/{id}', [App\Http\Controllers\CategoryWebController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}', [App\Http\Controllers\CategoryWebController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{id}', [App\Http\Controllers\CategoryWebController::class, 'show'])->name('categories.show');

Route::get('/categories/vue', function () {
    return view('categories.vue');
})->name('categories.vue');

// Rotas explícitas para CRUD de contas (accounts)
Route::get('accounts', [App\Http\Controllers\AccountWebController::class, 'index'])->name('accounts.index');
Route::get('accounts/create', [App\Http\Controllers\AccountWebController::class, 'create'])->name('accounts.create');
Route::post('accounts', [App\Http\Controllers\AccountWebController::class, 'store'])->name('accounts.store');
Route::get('accounts/{account}/edit', [App\Http\Controllers\AccountWebController::class, 'edit'])->name('accounts.edit');
Route::put('accounts/{account}', [App\Http\Controllers\AccountWebController::class, 'update'])->name('accounts.update');
Route::delete('accounts/{account}', [App\Http\Controllers\AccountWebController::class, 'destroy'])->name('accounts.destroy');
Route::get('accounts/{account}', [App\Http\Controllers\AccountWebController::class, 'show'])->name('accounts.show');

Route::get('/accounts/vue', function () {
    return view('accounts.vue');
})->name('accounts.vue');

// Rotas explícitas para CRUD de transações (transactions)
Route::get('transactions', [App\Http\Controllers\TransactionWebController::class, 'index'])->name('transactions.index');
Route::get('transactions/create', [App\Http\Controllers\TransactionWebController::class, 'create'])->name('transactions.create');
Route::post('transactions', [App\Http\Controllers\TransactionWebController::class, 'store'])->name('transactions.store');
Route::get('transactions/{transaction}/edit', [App\Http\Controllers\TransactionWebController::class, 'edit'])->name('transactions.edit');
Route::put('transactions/{transaction}', [App\Http\Controllers\TransactionWebController::class, 'update'])->name('transactions.update');
Route::delete('transactions/{transaction}', [App\Http\Controllers\TransactionWebController::class, 'destroy'])->name('transactions.destroy');
Route::get('transactions/{transaction}', [App\Http\Controllers\TransactionWebController::class, 'show'])->name('transactions.show');

Route::get('/transactions/vue', function () {
    return view('transactions.vue');
})->name('transactions.vue');

// Rotas explícitas para CRUD de transações customizadas (custom_transactions)
Route::get('custom-transactions', [App\Http\Controllers\CustomTransactionWebController::class, 'index'])->name('custom_transactions.index');
Route::get('custom-transactions/create', [App\Http\Controllers\CustomTransactionWebController::class, 'create'])->name('custom_transactions.create');
Route::post('custom-transactions', [App\Http\Controllers\CustomTransactionWebController::class, 'store'])->name('custom_transactions.store');
Route::get('custom-transactions/{customTransaction}/edit', [App\Http\Controllers\CustomTransactionWebController::class, 'edit'])->name('custom_transactions.edit');
Route::put('custom-transactions/{customTransaction}', [App\Http\Controllers\CustomTransactionWebController::class, 'update'])->name('custom_transactions.update');
Route::delete('custom-transactions/{customTransaction}', [App\Http\Controllers\CustomTransactionWebController::class, 'destroy'])->name('custom_transactions.destroy');
Route::get('custom-transactions/{customTransaction}', [App\Http\Controllers\CustomTransactionWebController::class, 'show'])->name('custom_transactions.show');

Route::get('/custom-transactions/vue', function () {
    return view('custom_transactions.vue');
})->name('custom_transactions.vue');

// Rotas explícitas para CRUD de contas a pagar (bills)
Route::get('bills', [App\Http\Controllers\BillWebController::class, 'index'])->name('bills.index');
Route::get('bills/create', [App\Http\Controllers\BillWebController::class, 'create'])->name('bills.create');
Route::post('bills', [App\Http\Controllers\BillWebController::class, 'store'])->name('bills.store');
Route::get('bills/{bill}/edit', [App\Http\Controllers\BillWebController::class, 'edit'])->name('bills.edit');
Route::put('bills/{bill}', [App\Http\Controllers\BillWebController::class, 'update'])->name('bills.update');
Route::delete('bills/{bill}', [App\Http\Controllers\BillWebController::class, 'destroy'])->name('bills.destroy');
Route::get('bills/{bill}', [App\Http\Controllers\BillWebController::class, 'show'])->name('bills.show');

Route::get('/bills/vue', function () {
    return view('bills.vue');
})->name('bills.vue');

// Rotas explícitas para CRUD de resumos financeiros (financial_summaries)
Route::get('financial-summaries', [App\Http\Controllers\FinancialSummaryWebController::class, 'index'])->name('financial_summaries.index');
Route::get('financial-summaries/create', [App\Http\Controllers\FinancialSummaryWebController::class, 'create'])->name('financial_summaries.create');
Route::post('financial-summaries', [App\Http\Controllers\FinancialSummaryWebController::class, 'store'])->name('financial_summaries.store');
Route::get('financial-summaries/{financialSummary}/edit', [App\Http\Controllers\FinancialSummaryWebController::class, 'edit'])->name('financial_summaries.edit');
Route::put('financial-summaries/{financialSummary}', [App\Http\Controllers\FinancialSummaryWebController::class, 'update'])->name('financial_summaries.update');
Route::delete('financial-summaries/{financialSummary}', [App\Http\Controllers\FinancialSummaryWebController::class, 'destroy'])->name('financial_summaries.destroy');
Route::get('financial-summaries/{financialSummary}', [App\Http\Controllers\FinancialSummaryWebController::class, 'show'])->name('financial_summaries.show');

Route::get('/financial-summaries/vue', function () {
    return view('financial_summaries.vue');
})->name('financial_summaries.vue');

// Rotas explícitas para CRUD de snapshots de resumo financeiro (financial_summary_snapshots)
Route::get('financial-summary-snapshots', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'index'])->name('financial_summary_snapshots.index');
Route::get('financial-summary-snapshots/create', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'create'])->name('financial_summary_snapshots.create');
Route::post('financial-summary-snapshots', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'store'])->name('financial_summary_snapshots.store');
Route::get('financial-summary-snapshots/{financialSummarySnapshot}/edit', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'edit'])->name('financial_summary_snapshots.edit');
Route::put('financial-summary-snapshots/{financialSummarySnapshot}', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'update'])->name('financial_summary_snapshots.update');
Route::delete('financial-summary-snapshots/{financialSummarySnapshot}', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'destroy'])->name('financial_summary_snapshots.destroy');
Route::get('financial-summary-snapshots/{financialSummarySnapshot}', [App\Http\Controllers\FinancialSummarySnapshotWebController::class, 'show'])->name('financial_summary_snapshots.show');

Route::get('/financial-summary-snapshots/vue', function () {
    return view('financial_summary_snapshots.vue');
})->name('financial_summary_snapshots.vue');
