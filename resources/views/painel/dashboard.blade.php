@extends('layouts.app')

@section('titulo', 'Dashboard - Painel Administrativo')

@section('conteudo')
<div class="container mx-auto px-4 py-8">
    <!-- Cabeçalho -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primario mb-2">Dashboard</h1>
        <p class="text-gray-600">Bem-vindo ao painel de controle do Evenza</p>
    </div>

    <!-- Cards de Resumo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total de Eventos -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider">Total de Eventos</p>
                    <p class="text-2xl font-bold text-primario">24</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-calendar text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Participantes -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider">Participantes</p>
                    <p class="text-2xl font-bold text-primario">156</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Eventos Ativos -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider">Eventos Ativos</p>
                    <p class="text-2xl font-bold text-primario">8</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-calendar-check text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Confirmações Pendentes -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider">Confirmações Pendentes</p>
                    <p class="text-2xl font-bold text-primario">12</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-clock text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Ações Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Novo Evento -->
        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="bg-primario p-3 rounded-full mr-4">
                    <i class="fas fa-plus text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-primario">Criar Novo Evento</h3>
            </div>
            <p class="text-gray-600 mb-4">Organize um novo evento em poucos cliques</p>
            <a href="{{ route('eventos.create') }}" class="bg-primario text-white px-4 py-2 rounded-lg hover:bg-primario_escuro transition-colors">
                Criar Evento
            </a>
        </div>

        <!-- Gerenciar Participantes -->
        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="bg-acento p-3 rounded-full mr-4">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-primario">Gerenciar Participantes</h3>
            </div>
            <p class="text-gray-600 mb-4">Visualize e gerencie participantes cadastrados</p>
            <a href="{{ route('participantes.index') }}" class="bg-acento text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-colors">
                Ver Participantes
            </a>
        </div>

        <!-- Relatórios -->
        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center mb-4">
                <div class="bg-green-600 p-3 rounded-full mr-4">
                    <i class="fas fa-chart-bar text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-primario">Relatórios</h3>
            </div>
            <p class="text-gray-600 mb-4">Visualize estatísticas e relatórios detalhados</p>
            <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                Ver Relatórios
            </a>
        </div>
    </div>

    <!-- Próximos Eventos -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <h2 class="text-xl font-semibold text-primario mb-4">Próximos Eventos</h2>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-2 rounded-full mr-4">
                        <i class="fas fa-calendar text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-primario">Workshop Laravel Avançado</h4>
                        <p class="text-sm text-gray-600">15 de Janeiro, 2025 - 14:00</p>
                    </div>
                </div>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    Confirmado
                </span>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-2 rounded-full mr-4">
                        <i class="fas fa-calendar text-yellow-600"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-primario">Reunião Estratégica Q1</h4>
                        <p class="text-sm text-gray-600">20 de Janeiro, 2025 - 09:00</p>
                    </div>
                </div>
                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
                    Pendente
                </span>
            </div>

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-purple-100 p-2 rounded-full mr-4">
                        <i class="fas fa-calendar text-purple-600"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-primario">Confraternização de Fim de Ano</h4>
                        <p class="text-sm text-gray-600">25 de Janeiro, 2025 - 19:00</p>
                    </div>
                </div>
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                    Planejamento
                </span>
            </div>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('eventos.index') }}" class="text-primario hover:text-primario_escuro font-medium">
                Ver todos os eventos →
            </a>
        </div>
    </div>

    <!-- Atividades Recentes -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-semibold text-primario mb-4">Atividades Recentes</h2>
        <div class="space-y-4">
            <div class="flex items-center">
                <div class="bg-green-100 p-2 rounded-full mr-4">
                    <i class="fas fa-user-plus text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-800">
                        <strong>João Silva</strong> se inscreveu no evento "Workshop Laravel Avançado"
                    </p>
                    <p class="text-xs text-gray-500">2 horas atrás</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="bg-blue-100 p-2 rounded-full mr-4">
                    <i class="fas fa-calendar-plus text-blue-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-800">
                        Novo evento <strong>"Palestra sobre Gestão de Projetos"</strong> foi criado
                    </p>
                    <p class="text-xs text-gray-500">5 horas atrás</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="bg-yellow-100 p-2 rounded-full mr-4">
                    <i class="fas fa-edit text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-800">
                        Evento <strong>"Reunião Estratégica Q1"</strong> foi atualizado
                    </p>
                    <p class="text-xs text-gray-500">1 dia atrás</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="bg-purple-100 p-2 rounded-full mr-4">
                    <i class="fas fa-envelope text-purple-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-800">
                        Convites enviados para <strong>25 participantes</strong>
                    </p>
                    <p class="text-xs text-gray-500">2 dias atrás</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection