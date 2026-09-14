@extends('layouts.app')

@section('title', 'Painel Principal')

@section('content')
<div class="container mt-4">
    <!-- Cabeçalho da Página -->
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-5 fw-bold text-primary">Bem-vindo ao Sistema</h1>
            <p class="lead text-muted">Confira as últimas atualizações e o painel de avisos abaixo.</p>
        </div>
    </div>

    <!-- Painel de Avisos Dinâmicos -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📢 Painel de Avisos</h5>
                    <span class="badge bg-danger">{{ $avisos->count() }} Ativos</span>
                </div>
                <div class="card-body">
                    @if($avisos->isEmpty())
                        <div class="text-center py-4">
                            <p class="text-muted mb-0">Não há nenhum aviso importante no momento.</p>
                        </div>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($avisos as $aviso)
                                <div class="list-group-item py-3">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <h6 class="mb-1 fw-bold text-secondary">{{ $aviso->titulo }}</h6>
                                        <small class="text-muted">{{ $aviso->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1 text-dark">{{ $aviso->conteudo }}</p>
                                    @if($aviso->urgente)
                                        <span class="badge bg-warning text-dark mt-1">⚠️ Urgente</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
