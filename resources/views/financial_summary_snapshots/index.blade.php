@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Snapshots de Resumo Financeiro</h3>
        <a href="{{ route('financial_summary_snapshots.create') }}" class="btn btn-primary">Nova Snapshot</a>
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
                @foreach($financialSummarySnapshots as $financialSummarySnapshot)
                    <tr>
                        <td>{{ $financialSummarySnapshot->id }}</td>
                        <td>{{ $financialSummarySnapshot->name }}</td>
                        <td>{{ $financialSummarySnapshot->description }}</td>
                        <td>
                            <a href="{{ route('financial_summary_snapshots.edit', $financialSummarySnapshot) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('financial_summary_snapshots.destroy', $financialSummarySnapshot) }}" method="POST" style="display:inline-block;">
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
