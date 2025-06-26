@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $categoriesCount ?? 0 }}</h3>
                <p>Categorias</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- Adicione mais cards aqui se quiser -->
</div>
@endsection
