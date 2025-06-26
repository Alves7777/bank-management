@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Transações Customizadas</h3>
        <a href="{{ route('custom_transactions.create') }}" class="btn btn-primary">Nova Transação Customizada</a>
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
                @foreach($customTransactions as $customTransaction)
                    <tr>
                        <td>{{ $customTransaction->id }}</td>
                        <td>{{ $customTransaction->name }}</td>
                        <td>{{ $customTransaction->description }}</td>
                        <td>
                            <a href="{{ route('custom_transactions.edit', $customTransaction) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('custom_transactions.destroy', $customTransaction) }}" method="POST" style="display:inline-block;">
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
