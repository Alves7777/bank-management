@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Resumos Financeiros</h3>
        <a href="{{ route('financial_summaries.create') }}" class="btn btn-primary">Novo Resumo Financeiro</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($financialSummaries as $financialSummary)
                    <tr>
                        <td>{{ $financialSummary->id }}</td>
                        <td>{{ $financialSummary->name }}</td>
                        <td>{{ $financialSummary->description }}</td>
                        <td>
                            <a href="{{ route('financial_summaries.edit', $financialSummary) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('financial_summaries.destroy', $financialSummary) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
