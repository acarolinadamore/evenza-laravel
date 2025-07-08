@extends('layouts.app')

@section('titulo', 'Painel - Evenza')

@section('conteudo')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-5">
                <h1 class="display-4" style="color: var(--primary);">
                    <i class="fas fa-tachometer-alt me-3"></i>
                    Painel de Controle
                </h1>
                <p class="lead text-muted">Gerencie seus eventos com facilidade</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Card Eventos -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-calendar-alt" style="font-size: 3rem; color: var(--accent);"></i>
                    </div>
                    <h5 class="card-title">Eventos</h5>
                    <p class="card-text text-muted">Visualize e gerencie todos os seus eventos</p>
                    <a href="{{ route('eventos.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-eye me-2"></i>Ver Eventos
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Novo Evento -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-plus-circle" style="font-size: 3rem; color: var(--accent);"></i>
                    </div>
                    <h5 class="card-title">Novo Evento</h5>
                    <p class="card-text text-muted">Crie um novo evento rapidamente</p>
                    <a href="{{ route('eventos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Criar Evento
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Participantes -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-users" style="font-size: 3rem; color: var(--accent);"></i>
                    </div>
                    <h5 class="card-title">Participantes</h5>
                    <p class="card-text text-muted">Gerencie os participantes dos eventos</p>
                    <a href="{{ route('participantes.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-eye me-2"></i>Ver Participantes
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Novo Participante -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-user-plus" style="font-size: 3rem; color: var(--accent);"></i>
                    </div>
                    <h5 class="card-title">Novo Participante</h5>
                    <p class="card-text text-muted">Adicione novos participantes</p>
                    <a href="{{ route('participantes.create') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Adicionar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Estatísticas -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="mb-0" style="color: var(--primary);">
                        <i class="fas fa-chart-bar me-2"></i>
                        Resumo Rápido
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row text-center g-4">
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="fas fa-calendar-check" style="font-size: 2rem; color: var(--accent);"></i>
                                <h3 class="mt-2 mb-0" style="color: var(--primary);">0</h3>
                                <p class="text-muted mb-0">Eventos Ativos</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="fas fa-users" style="font-size: 2rem; color: var(--accent);"></i>
                                <h3 class="mt-2 mb-0" style="color: var(--primary);">0</h3>
                                <p class="text-muted mb-0">Total Participantes</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="fas fa-calendar-alt" style="font-size: 2rem; color: var(--accent);"></i>
                                <h3 class="mt-2 mb-0" style="color: var(--primary);">0</h3>
                                <p class="text-muted mb-0">Eventos Hoje</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3">
                                <i class="fas fa-star" style="font-size: 2rem; color: var(--accent);"></i>
                                <h3 class="mt-2 mb-0" style="color: var(--primary);">0</h3>
                                <p class="text-muted mb-0">Eventos Finalizados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
    border-radius: 25px;
    padding: 10px 25px;
    font-weight: 600;
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-2px);
}

.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
    border-radius: 25px;
    padding: 10px 25px;
    font-weight: 600;
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    border-color: var(--primary);
    transform: translateY(-2px);
}
</style>
@endsection