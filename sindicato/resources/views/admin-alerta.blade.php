@extends('layouts.app')

@section('title', 'Editar Alerta Urgente')

@section('content')
<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">📝 Editar Conteúdo do Alerta</h5>
        </div>
        <div class="card-body p-4">
            
            @if(session('sucesso'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    🎉 {{ session('sucesso') }}
                </div>
            @endif

            <form action="{{ route('admin.alerta.update') }}" method="POST">
                @csrf 

                <div class="mb-3">
                    <label for="titulo" class="form-label fw-bold">Título em Negrito:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $alerta->titulo ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="conteudo" class="form-label fw-bold">Conteúdo do Alerta:</label>
                    <textarea class="form-control" id="conteudo" name="conteudo" rows="4" required>{{ old('conteudo', $alerta->conteudo ?? '') }}</textarea>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="visivel" name="visivel" value="1" {{ !isset($alerta->visivel) || $alerta->visivel ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="visivel">Exibir este banner de aviso publicamente no site</label>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="urgente" name="urgente" value="1" {{ !isset($alerta->urgente) || $alerta->urgente ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="urgente">Marcar este comunicado com a tag "⚠️ Urgente"</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm" style="background-color: #0d3b66; border: none;">
                    Salvar e Atualizar Portal
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
