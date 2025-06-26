@extends('layouts.app')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Snapshot</h3>
    </div>
    <form action="{{ route('financial_summary_snapshots.update', $financialSummarySnapshot) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $financialSummarySnapshot->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $financialSummarySnapshot->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('financial_summary_snapshots.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
