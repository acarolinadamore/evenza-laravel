{{-- 
ARQUIVO: resources/views/eventos/index.blade.php
DESCRIÇÃO: Página de listagem de eventos com filtros e ações
ROTA: /eventos
--}}

@extends('layouts.app')

@section('titulo', 'Lista de Eventos')

@section('conteudo')
<div class="container mx-auto px-4 py-8">
    <!-- Cabeçalho -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primario mb-2">Eventos</h1>
            <p class="text-gray-600">Gerencie todos os seus eventos em um só lugar</p>
        </div>
        <a href="{{ route('eventos.create') }}" class="bg-primario text-white px-6 py-3 rounded-lg hover:bg-primario_escuro transition-colors flex items-center font-semibold mt-4 lg:mt-0">
            <i class="fas fa-plus mr-2"></i>
            Novo Evento
        </a>
    </div>

    {{-- Simular dados expandidos para demonstração --}}
    @php
        $eventos = collect([
            (object) [
                'id' => 1,
                'titulo' => 'Workshop Laravel Avançado',
                'descricao' => 'Workshop prático sobre desenvolvimento avançado com Laravel, incluindo temas como API REST, autenticação, testes e deploy.',
                'data_evento' => '2025-01-15',
                'hora_evento' => '14:00',
                'local' => 'Centro de Convenções Campo Grande',
                'endereco' => 'Av. Brasil Central, 477',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 50,
                'participantes_confirmados' => 32,
                'tipo_evento' => 'workshop',
                'status' => 'confirmado',
                'created_at' => '2025-01-05'
            ],
            (object) [
                'id' => 2,
                'titulo' => 'Reunião Estratégica Q1',
                'descricao' => 'Apresentação dos resultados do último trimestre e planejamento estratégico para o primeiro trimestre de 2025.',
                'data_evento' => '2025-01-20',
                'hora_evento' => '09:00',
                'local' => 'Sala de Reuniões - Matriz',
                'endereco' => 'Rua das Empresas, 123',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 15,
                'participantes_confirmados' => 12,
                'tipo_evento' => 'reuniao',
                'status' => 'confirmado',
                'created_at' => '2025-01-03'
            ],
            (object) [
                'id' => 3,
                'titulo' => 'Palestra sobre Gestão de Projetos',
                'descricao' => 'Palestra sobre metodologias ágeis e gestão de projetos de software com foco em Scrum e Kanban.',
                'data_evento' => '2025-01-25',
                'hora_evento' => '19:00',
                'local' => 'Auditório Principal - IFMS',
                'endereco' => 'Av. dos Estudantes, 456',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 100,
                'participantes_confirmados' => 67,
                'tipo_evento' => 'palestra',
                'status' => 'confirmado',
                'created_at' => '2025-01-02'
            ],
            (object) [
                'id' => 4,
                'titulo' => 'Treinamento de Vendas',
                'descricao' => 'Treinamento intensivo para equipe de vendas com técnicas avançadas de negociação e fechamento.',
                'data_evento' => '2025-02-01',
                'hora_evento' => '08:00',
                'local' => 'Centro de Treinamento',
                'endereco' => 'Rua do Comércio, 789',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 25,
                'participantes_confirmados' => 18,
                'tipo_evento' => 'treinamento',
                'status' => 'planejamento',
                'created_at' => '2025-01-01'
            ],
            (object) [
                'id' => 5,
                'titulo' => 'Confraternização de Fim de Ano',
                'descricao' => 'Festa de confraternização para celebrar os resultados do ano e integrar toda a equipe.',
                'data_evento' => '2025-12-20',
                'hora_evento' => '18:00',
                'local' => 'Clube Recreativo',
                'endereco' => 'Av. da Festa, 321',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 200,
                'participantes_confirmados' => 0,
                'tipo_evento' => 'confraternizacao',
                'status' => 'planejamento',
                'created_at' => '2025-01-04'
            ],
            (object) [
                'id' => 6,
                'titulo' => 'Hackathon Inovação 2025',
                'descricao' => 'Competição de 48 horas para desenvolvimento de soluções inovadoras em tecnologia.',
                'data_evento' => '2025-03-15',
                'hora_evento' => '08:00',
                'local' => 'Hub de Inovação',
                'endereco' => 'Av. Tecnologia, 1000',
                'cidade' => 'Campo Grande',
                'limite_participantes' => 80,
                'participantes_confirmados' => 45,
                'tipo_evento' => 'outro',
                'status' => 'confirmado',
                'created_at' => '2025-01-06'
            ]
        ]);
    @endphp

    <!-- Estatísticas Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de Eventos</p>
                    <p class="text-2xl font-bold text-primario">{{ $eventos->count() }}</p>
                </div>
                <div class="bg-blue-100 p-2 rounded-full">
                    <i class="fas fa-calendar text-blue-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Confirmados</p>
                    <p class="text-2xl font-bold text-green-600">{{ $eventos->where('status', 'confirmado')->count() }}</p>
                </div>
                <div class="bg-green-100 p-2 rounded-full">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Em Planejamento</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $eventos->where('status', 'planejamento')->count() }}</p>
                </div>
                <div class="bg-yellow-100 p-2 rounded-full">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Participantes</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $eventos->sum('participantes_confirmados') }}</p>
                </div>
                <div class="bg-purple-100 p-2 rounded-full">
                    <i class="fas fa-users text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>

    @if($eventos->count() > 0)
        <!-- Filtros -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <form method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <input type="text" name="busca" placeholder="Buscar por título..." 
                               value="{{ request('busca') }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                    </div>
                    <div>
                        <select name="tipo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="">Todos os tipos</option>
                            <option value="workshop" {{ request('tipo') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="palestra" {{ request('tipo') == 'palestra' ? 'selected' : '' }}>Palestra</option>
                            <option value="reuniao" {{ request('tipo') == 'reuniao' ? 'selected' : '' }}>Reunião</option>
                            <option value="treinamento" {{ request('tipo') == 'treinamento' ? 'selected' : '' }}>Treinamento</option>
                            <option value="confraternizacao" {{ request('tipo') == 'confraternizacao' ? 'selected' : '' }}>Confraternização</option>
                        </select>
                    </div>
                    <div>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="">Todos os status</option>
                            <option value="planejamento" {{ request('status') == 'planejamento' ? 'selected' : '' }}>Planejamento</option>
                            <option value="confirmado" {{ request('status') == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                            <option value="cancelado" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            <option value="realizado" {{ request('status') == 'realizado' ? 'selected' : '' }}>Realizado</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-primario text-white px-4 py-2 rounded-lg hover:bg-primario_escuro transition-colors flex items-center justify-center">
                            <i class="fas fa-search mr-2"></i> Filtrar
                        </button>
                        <a href="{{ route('eventos.index') }}" class="flex-1 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i> Limpar
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Lista de Eventos -->
        <div class="grid grid-cols-1 gap-6">
            @foreach($eventos as $evento)
                @if($evento->status === 'confirmado')
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-green-500">
                @elseif($evento->status === 'planejamento')
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-yellow-500">
                @elseif($evento->status === 'cancelado')
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-red-500">
                @else
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 border-gray-300">
                @endif
                    
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-xl font-semibold text-primario">{{ $evento->titulo }}</h3>
                                    @if($evento->status === 'confirmado')
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                            {{ ucfirst($evento->status) }}
                                        </span>
                                    @elseif($evento->status === 'planejamento')
                                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                                            {{ ucfirst($evento->status) }}
                                        </span>
                                    @elseif($evento->status === 'cancelado')
                                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">
                                            {{ ucfirst($evento->status) }}
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">
                                            {{ ucfirst($evento->status) }}
                                        </span>
                                    @endif
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                        {{ ucfirst($evento->tipo_evento) }}
                                    </span>
                                </div>
                                
                                @if($evento->descricao)
                                    <p class="text-gray-600 mb-3 texto-limitado">{{ $evento->descricao }}</p>
                                @endif
                            </div>
                            
                            <div class="flex items-center gap-2 mt-4 lg:mt-0">
                                <a href="{{ route('eventos.show', $evento->id) }}" 
                                   class="bg-blue-100 text-blue-600 p-2 rounded-lg hover:bg-blue-200 transition-colors" 
                                   title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('eventos.edit', $evento->id) }}" 
                                   class="bg-yellow-100 text-yellow-600 p-2 rounded-lg hover:bg-yellow-200 transition-colors" 
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="excluirEvento({{ $evento->id }})" 
                                        class="bg-red-100 text-red-600 p-2 rounded-lg hover:bg-red-200 transition-colors" 
                                        title="Excluir">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Informações do Evento -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-clock mr-2 text-green-500"></i>
                                {{ \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') }}
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                {{ Str::limit($evento->local, 25) }}
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-users mr-2 text-purple-500"></i>
                                {{ $evento->participantes_confirmados }}/{{ $evento->limite_participantes }} participantes
                            </div>
                        </div>

                        <!-- Barra de Progresso -->
                        <div class="mb-4">
                            <div class="flex justify-between items-center text-sm text-gray-600 mb-1">
                                <span>Ocupação</span>
                                <span>{{ round(($evento->participantes_confirmados / $evento->limite_participantes) * 100) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primario h-2 rounded-full" 
                                     style="width: {{ min(($evento->participantes_confirmados / $evento->limite_participantes) * 100, 100) }}%">
                                </div>
                            </div>
                        </div>

                        <!-- Ações Rápidas -->
                        <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-100">
                            <a href="{{ route('eventos.show', $evento->id) }}" 
                               class="bg-primario text-white px-4 py-2 rounded-lg hover:bg-primario_escuro transition-colors text-sm flex items-center">
                                <i class="fas fa-eye mr-2"></i>
                                Ver Detalhes
                            </a>
                            
                            <a href="{{ route('eventos.edit', $evento->id) }}" 
                               class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors text-sm flex items-center">
                                <i class="fas fa-edit mr-2"></i>
                                Editar
                            </a>
                            
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm flex items-center">
                                <i class="fas fa-envelope mr-2"></i>
                                Enviar Convites
                            </button>
                            
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm flex items-center">
                                <i class="fas fa-download mr-2"></i>
                                Relatório
                            </button>
                            
                            @if($evento->status === 'planejamento')
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm flex items-center">
                                    <i class="fas fa-check mr-2"></i>
                                    Confirmar Evento
                                </button>
                            @endif
                            
                            @if($evento->status === 'confirmado')
                                <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm flex items-center">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancelar Evento
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="flex justify-center mt-8">
            <nav class="flex items-center space-x-2">
                <button class="px-3 py-2 text-gray-500 hover:text-primario transition-colors" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 bg-primario text-white rounded-lg">1</button>
                <button class="px-4 py-2 text-gray-500 hover:text-primario transition-colors">2</button>
                <button class="px-4 py-2 text-gray-500 hover:text-primario transition-colors">3</button>
                <button class="px-3 py-2 text-gray-500 hover:text-primario transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>

    @else
        <!-- Estado vazio -->
        <div class="bg-white rounded-lg shadow-sm text-center py-16">
            <div class="text-gray-400 mb-6">
                <i class="fas fa-calendar-times text-6xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-primario mb-4">Nenhum evento encontrado</h3>
            <p class="text-gray-600 mb-8">
                @if(request()->hasAny(['busca', 'tipo', 'status']))
                    Nenhum evento corresponde aos filtros aplicados. Tente ajustar os critérios de busca.
                @else
                    Comece criando seu primeiro evento para gerenciar sua agenda.
                @endif
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if(request()->hasAny(['busca', 'tipo', 'status']))
                    <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Limpar Filtros
                    </a>
                @endif
                <a href="{{ route('eventos.create') }}" class="bg-primario text-white px-8 py-3 rounded-lg hover:bg-primario_escuro transition-colors inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Primeiro Evento
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Formulários ocultos para ações -->
<form id="form-exclusao" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
    .texto-limitado {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<script>
    function excluirEvento(id) {
        if (confirm('Tem certeza que deseja excluir este evento?\n\nEsta ação não pode ser desfeita.')) {
            const form = document.getElementById('form-exclusao');
            form.action = '/eventos/' + id;
            form.submit();
        }
    }
    
    const buscaInput = document.querySelector('input[name="busca"]');
    if (buscaInput) {
        let timeoutId;
        buscaInput.addEventListener('input', function() {
            clearTimeout(timeoutId);
            const form = this.form;
            timeoutId = setTimeout(function() {
                form.submit();
            }, 500);
        });
    }
</script>
@endsection