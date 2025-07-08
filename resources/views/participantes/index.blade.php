@extends('layouts.app')

@section('titulo', 'Lista de Participantes')

@section('conteudo')
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
    <h1 class="titulo-principal text-4xl text-gray-800 mb-4 lg:mb-0">Participantes</h1>
    <a href="{{ route('participantes.create') }}" class="botao-evenza">
        <i class="fas fa-user-plus mr-2"></i>
        Novo Participante
    </a>
</div>

@if($participantes->count() > 0)
    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="busca" placeholder="Buscar por nome ou email..." 
                       value="{{ request('busca') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-search mr-1"></i> Buscar
                </button>
                <a href="{{ route('participantes.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    <i class="fas fa-times mr-1"></i> Limpar
                </a>
            </div>
        </form>
    </div>

    <!-- Estatísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total de Participantes</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $participantes->total() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Com Email</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $participantes->where('email', '!=', null)->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <i class="fas fa-phone text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Com Telefone</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $participantes->where('telefone', '!=', null)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Participantes -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-user mr-1"></i>
                            Participante
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-envelope mr-1"></i>
                            Contato
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-id-card mr-1"></i>
                            CPF
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-sticky-note mr-1"></i>
                            Observação
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-cogs mr-1"></i>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($participantes as $participante)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $participante->nome }}</div>
                                        <div class="text-sm text-gray-500">ID: #{{ $participante->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if($participante->email)
                                        <div class="flex items-center mb-1">
                                            <i class="fas fa-envelope mr-2 text-blue-500"></i>
                                            <a href="mailto:{{ $participante->email }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $participante->email }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($participante->telefone)
                                        <div class="flex items-center">
                                            <i class="fas fa-phone mr-2 text-green-500"></i>
                                            <a href="tel:{{ $participante->telefone }}" class="text-green-600 hover:text-green-800">
                                                {{ $participante->telefone }}
                                            </a>
                                        </div>
                                    @endif
                                    @if(!$participante->email && !$participante->telefone)
                                        <span class="text-gray-500 italic">Sem contato</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($participante->cpf)
                                    <span class="font-mono">{{ $participante->cpf }}</span>
                                @else
                                    <span class="text-gray-500 italic">Não informado</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($participante->observacao)
                                    <div class="max-w-xs truncate" title="{{ $participante->observacao }}">
                                        {{ Str::limit($participante->observacao, 50) }}
                                    </div>
                                @else
                                    <span class="text-gray-500 italic">Sem observação</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('participantes.show', $participante) }}" 
                                       class="text-green-600 hover:text-green-800 transition-colors" 
                                       title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('participantes.edit', $participante) }}" 
                                       class="text-blue-600 hover:text-blue-800 transition-colors" 
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('participantes.destroy', $participante) }}" 
                                          class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja excluir este participante?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 transition-colors" 
                                                title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginação -->
    @if($participantes->hasPages())
        <div class="mt-6">
            {{ $participantes->links() }}
        </div>
    @endif

@else
    <!-- Estado vazio -->
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <div class="text-gray-400 mb-4">
            <i class="fas fa-user-slash text-6xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-600 mb-2">Nenhum participante cadastrado</h3>
        <p class="text-gray-500 mb-6">Comece adicionando participantes para gerenciar sua lista de contatos.</p>
        <a href="{{ route('participantes.create') }}" class="botao-evenza">
            <i class="fas fa-user-plus mr-2"></i>
            Cadastrar Primeiro Participante
        </a>
    </div>
@endif

<!-- Ações em Lote -->
@if($participantes->count() > 0)
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            <i class="fas fa-layer-group mr-2"></i>
            Ações em Lote
        </h3>
        <div class="flex flex-wrap gap-3">
            <button onclick="exportarParticipantes()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                <i class="fas fa-file-excel mr-2"></i>
                Exportar Excel
            </button>
            <button onclick="imprimirLista()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                <i class="fas fa-print mr-2"></i>
                Imprimir Lista
            </button>
            <button onclick="enviarEmailLote()" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition-colors">
                <i class="fas fa-envelope mr-2"></i>
                Email em Lote
            </button>
        </div>
    </div>
@endif

<script>
function exportarParticipantes() {
    alert('Funcionalidade de exportação será implementada em breve!');
}

function imprimirLista() {
    window.print();
}

function enviarEmailLote() {
    alert('Funcionalidade de email em lote será implementada em breve!');
}
</script>

<style>
@media print {
    .no-print {
        display: none !important;
    }
    
    body {
        font-size: 12px;
    }
    
    .titulo-principal {
        font-size: 24px !important;
    }
}
</style>
@endsection