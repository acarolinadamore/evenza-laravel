{{-- 
ARQUIVO: resources/views/eventos/show.blade.php
DESCRIÇÃO: Página de visualização detalhada do evento
ROTA: /eventos/{id}
--}}

@extends('layouts.app')

@section('titulo', 'Visualizar Evento')

@section('conteudo')
<div class="container mx-auto px-4 py-8">
    {{-- Simular dados do evento --}}
    @php
        $evento = (object) [
            'id' => $id,
            'titulo' => 'Workshop Laravel Avançado',
            'descricao' => 'Workshop prático sobre desenvolvimento avançado com Laravel, incluindo temas como API REST, autenticação, testes e deploy. Os participantes terão acesso a material exclusivo e certificado de participação.',
            'data_evento' => '2025-01-15',
            'hora_evento' => '14:00',
            'local' => 'Centro de Convenções Campo Grande',
            'endereco' => 'Av. Brasil Central, 477 - Centro',
            'cidade' => 'Campo Grande',
            'limite_participantes' => 50,
            'participantes_confirmados' => 32,
            'participantes_pendentes' => 8,
            'tipo_evento' => 'workshop',
            'status' => 'confirmado',
            'observacoes' => 'Trazer laptop com ambiente de desenvolvimento configurado. Material de apoio será fornecido.',
            'requer_confirmacao' => true,
            'evento_publico' => true,
            'enviar_lembretes' => true,
            'created_at' => '2025-01-05 10:30:00',
            'updated_at' => '2025-01-07 14:15:00'
        ];

        // Calcular porcentagem para barra de progresso
        $porcentagem_ocupacao = round(($evento->participantes_confirmados / $evento->limite_participantes) * 100);
        $largura_barra = min($porcentagem_ocupacao, 100);
    @endphp

    <!-- Cabeçalho -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <h1 class="text-3xl font-bold text-primario">{{ $evento->titulo }}</h1>
                @if($evento->status === 'confirmado')
                    <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-800">Confirmado</span>
                @elseif($evento->status === 'planejamento')
                    <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">Planejamento</span>
                @elseif($evento->status === 'cancelado')
                    <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">Cancelado</span>
                @else
                    <span class="px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-800">{{ ucfirst($evento->status) }}</span>
                @endif
                <span class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">{{ ucfirst($evento->tipo_evento) }}</span>
            </div>
            <p class="text-gray-600">Criado em {{ \Carbon\Carbon::parse($evento->created_at)->format('d/m/Y H:i') }}</p>
        </div>
        
        <div class="flex flex-wrap gap-2 mt-4 lg:mt-0">
            <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Voltar
            </a>
            <a href="{{ route('eventos.edit', $evento->id) }}" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>
                Editar
            </a>
            <button onclick="excluirEvento()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-trash mr-2"></i>
                Excluir
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Informações Principais -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Descrição -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Descrição
                </h2>
                <p class="text-gray-700 leading-relaxed">{{ $evento->descricao }}</p>
            </div>

            <!-- Data e Hora -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Data e Hora
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-calendar text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Data</p>
                            <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($evento->data_evento)->locale('pt_BR')->isoFormat('dddd') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-clock text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Horário</p>
                            <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') }}</p>
                            <p class="text-sm text-gray-500">Horário de Brasília</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Localização -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Localização
                </h2>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-building text-gray-400 mt-1 mr-3"></i>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $evento->local }}</p>
                            <p class="text-gray-600">{{ $evento->endereco }}</p>
                            <p class="text-gray-600">{{ $evento->cidade }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Ver no Google Maps</span>
                            <a href="#" class="text-primario hover:text-primario_escuro">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observações -->
            @if($evento->observacoes)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-sticky-note mr-2"></i>
                    Observações
                </h2>
                <p class="text-gray-700">{{ $evento->observacoes }}</p>
            </div>
            @endif

            <!-- Histórico de Alterações -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-history mr-2"></i>
                    Histórico
                </h2>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-plus text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-800">Evento criado</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($evento->created_at)->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-800">Última atualização</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($evento->updated_at)->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Estatísticas -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Estatísticas
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Confirmados</span>
                        <span class="font-semibold text-green-600">{{ $evento->participantes_confirmados }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Pendentes</span>
                        <span class="font-semibold text-yellow-600">{{ $evento->participantes_pendentes }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Limite</span>
                        <span class="font-semibold text-gray-800">{{ $evento->limite_participantes }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Disponíveis</span>
                        <span class="font-semibold text-blue-600">{{ $evento->limite_participantes - $evento->participantes_confirmados }}</span>
                    </div>
                </div>
                
                <!-- Barra de Progresso -->
                <div class="mt-4">
                    <div class="flex justify-between items-center text-sm text-gray-600 mb-2">
                        <span>Ocupação</span>
                        <span>{{ $porcentagem_ocupacao }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-primario h-3 rounded-full barra-progresso" data-largura="{{ $largura_barra }}"></div>
                    </div>
                </div>
            </div>

            <!-- Configurações -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-cogs mr-2"></i>
                    Configurações
                </h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Requer RSVP</span>
                        @if($evento->requer_confirmacao)
                            <span class="text-sm px-2 py-1 rounded-full bg-green-100 text-green-800">Sim</span>
                        @else
                            <span class="text-sm px-2 py-1 rounded-full bg-gray-100 text-gray-800">Não</span>
                        @endif
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Evento Público</span>
                        @if($evento->evento_publico)
                            <span class="text-sm px-2 py-1 rounded-full bg-green-100 text-green-800">Sim</span>
                        @else
                            <span class="text-sm px-2 py-1 rounded-full bg-gray-100 text-gray-800">Não</span>
                        @endif
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Lembretes</span>
                        @if($evento->enviar_lembretes)
                            <span class="text-sm px-2 py-1 rounded-full bg-green-100 text-green-800">Ativo</span>
                        @else
                            <span class="text-sm px-2 py-1 rounded-full bg-gray-100 text-gray-800">Inativo</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-bolt mr-2"></i>
                    Ações Rápidas
                </h2>
                <div class="space-y-3">
                    <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-envelope mr-2"></i>
                        Enviar Convites
                    </button>
                    
                    <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-users mr-2"></i>
                        Gerenciar Participantes
                    </button>
                    
                    <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i>
                        Baixar Relatório
                    </button>
                    
                    <button class="w-full bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-copy mr-2"></i>
                        Duplicar Evento
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulário oculto para exclusão -->
<form id="form-exclusao" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
    .barra-progresso {
        transition: width 0.3s ease;
    }
</style>

<script>
    function excluirEvento() {
        if (confirm('Tem certeza que deseja excluir este evento?\n\nEsta ação não pode ser desfeita e todos os dados relacionados serão perdidos.')) {
            document.getElementById('form-exclusao').submit();
        }
    }

    // Aplicar largura da barra de progresso via JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const barraProgresso = document.querySelector('.barra-progresso');
        if (barraProgresso) {
            const largura = barraProgresso.getAttribute('data-largura');
            barraProgresso.style.width = largura + '%';
        }
    });
</script>
@endsection