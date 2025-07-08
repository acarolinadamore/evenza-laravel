@extends('layouts.app')

@section('titulo', 'Visualizar Participante')

@section('conteudo')
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
    <h1 class="titulo-principal text-4xl text-gray-800 mb-4 lg:mb-0">{{ $participante->nome }}</h1>
    <div class="flex flex-col sm:flex-row gap-3">
        <a href="{{ route('participantes.edit', $participante) }}" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition-colors text-center">
            <i class="fas fa-edit mr-2"></i>
            Editar
        </a>
        <a href="{{ route('participantes.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700 transition-colors text-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Voltar para Lista
        </a>
    </div>
</div>

<!-- Cartão Principal do Participante -->
<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-6">
        <div class="flex items-center">
            <div class="bg-white bg-opacity-20 rounded-full p-4 mr-4">
                <i class="fas fa-user text-3xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-1">{{ $participante->nome }}</h2>
                <p class="text-green-100">ID: #{{ $participante->id }}</p>
            </div>
        </div>
    </div>

    <div class="p-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Informações de Contato -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-address-card mr-2 text-green-600"></i>
                    Informações de Contato
                </h3>
                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-start">
                        <i class="fas fa-envelope mr-3 text-blue-500 mt-1"></i>
                        <div>
                            <strong class="text-gray-700">Email:</strong><br>
                            @if($participante->email)
                                <a href="mailto:{{ $participante->email }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $participante->email }}
                                </a>
                                <button onclick="copiarEmail()" class="ml-2 text-gray-500 hover:text-gray-700" title="Copiar email">
                                    <i class="fas fa-copy"></i>
                                </button>
                            @else
                                <span class="text-gray-500 italic">Não informado</span>
                            @endif
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="flex items-start">
                        <i class="fas fa-phone mr-3 text-green-500 mt-1"></i>
                        <div>
                            <strong class="text-gray-700">Telefone:</strong><br>
                            @if($participante->telefone)
                                <a href="tel:{{ $participante->telefone }}" class="text-green-600 hover:text-green-800 hover:underline">
                                    {{ $participante->telefone }}
                                </a>
                                <button onclick="copiarTelefone()" class="ml-2 text-gray-500 hover:text-gray-700" title="Copiar telefone">
                                    <i class="fas fa-copy"></i>
                                </button>
                            @else
                                <span class="text-gray-500 italic">Não informado</span>
                            @endif
                        </div>
                    </div>

                    <!-- CPF -->
                    <div class="flex items-start">
                        <i class="fas fa-id-card mr-3 text-purple-500 mt-1"></i>
                        <div>
                            <strong class="text-gray-700">CPF:</strong><br>
                            @if($participante->cpf)
                                <span class="font-mono text-gray-600">{{ $participante->cpf }}</span>
                                <button onclick="copiarCpf()" class="ml-2 text-gray-500 hover:text-gray-700" title="Copiar CPF">
                                    <i class="fas fa-copy"></i>
                                </button>
                            @else
                                <span class="text-gray-500 italic">Não informado</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observações -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-sticky-note mr-2 text-yellow-600"></i>
                    Observações
                </h3>
                @if($participante->observacao)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700 leading-relaxed">{{ $participante->observacao }}</p>
                    </div>
                @else
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-500 italic">Nenhuma observação foi adicionada para este participante.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Ações Rápidas -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        <i class="fas fa-bolt mr-2 text-yellow-600"></i>
        Ações Rápidas
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Editar -->
        <a href="{{ route('participantes.edit', $participante) }}" 
           class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">
            <i class="fas fa-edit mb-2 text-xl block"></i>
            <span class="text-sm">Editar Participante</span>
        </a>

        <!-- Enviar Email -->
        @if($participante->email)
            <a href="mailto:{{ $participante->email }}" 
               class="bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition-colors text-center">
                <i class="fas fa-envelope mb-2 text-xl block"></i>
                <span class="text-sm">Enviar Email</span>
            </a>
        @else
            <div class="bg-gray-300 text-gray-500 px-4 py-3 rounded-lg text-center">
                <i class="fas fa-envelope mb-2 text-xl block"></i>
                <span class="text-sm">Sem Email</span>
            </div>
        @endif

        <!-- Ligar -->
        @if($participante->telefone)
            <a href="tel:{{ $participante->telefone }}" 
               class="bg-purple-600 text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition-colors text-center">
                <i class="fas fa-phone mb-2 text-xl block"></i>
                <span class="text-sm">Ligar</span>
            </a>
        @else
            <div class="bg-gray-300 text-gray-500 px-4 py-3 rounded-lg text-center">
                <i class="fas fa-phone mb-2 text-xl block"></i>
                <span class="text-sm">Sem Telefone</span>
            </div>
        @endif

        <!-- Imprimir -->
        <button onclick="window.print()" 
                class="bg-gray-600 text-white px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors text-center">
            <i class="fas fa-print mb-2 text-xl block"></i>
            <span class="text-sm">Imprimir</span>
        </button>
    </div>
</div>

<!-- Informações do Sistema -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        <i class="fas fa-cogs mr-2 text-gray-600"></i>
        Informações do Sistema
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center mb-2">
                <i class="fas fa-plus-circle text-green-600 mr-2"></i>
                <strong class="text-gray-700">Cadastrado em:</strong>
            </div>
            <p class="text-gray-600">{{ $participante->created_at->format('d/m/Y H:i') }}</p>
            <p class="text-sm text-gray-500">{{ $participante->created_at->diffForHumans() }}</p>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center mb-2">
                <i class="fas fa-edit text-blue-600 mr-2"></i>
                <strong class="text-gray-700">Última atualização:</strong>
            </div>
            <p class="text-gray-600">{{ $participante->updated_at->format('d/m/Y H:i') }}</p>
            <p class="text-sm text-gray-500">{{ $participante->updated_at->diffForHumans() }}</p>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center mb-2">
                <i class="fas fa-hashtag text-purple-600 mr-2"></i>
                <strong class="text-gray-700">ID do Participante:</strong>
            </div>
            <p class="text-gray-600">#{{ $participante->id }}</p>
            <p class="text-sm text-gray-500">Identificador único</p>
        </div>
    </div>
</div>

<!-- Navegação entre Participantes -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        <i class="fas fa-arrow-left mr-2 text-gray-600"></i>
        <i class="fas fa-arrow-right mr-2 text-gray-600"></i>
        Navegação
    </h3>
    <div class="flex justify-between items-center">
        @if($participanteAnterior)
            <a href="{{ route('participantes.show', $participanteAnterior) }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                <i class="fas fa-chevron-left mr-2"></i>
                Participante Anterior
            </a>
        @else
            <span class="text-gray-400">
                <i class="fas fa-chevron-left mr-2"></i>
                Primeiro participante
            </span>
        @endif

        <a href="{{ route('participantes.index') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
            <i class="fas fa-list mr-2"></i>
            Todos os Participantes
        </a>

        @if($proximoParticipante)
            <a href="{{ route('participantes.show', $proximoParticipante) }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                Próximo Participante
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        @else
            <span class="text-gray-400">
                Último participante
                <i class="fas fa-chevron-right ml-2"></i>
            </span>
        @endif
    </div>
</div>

<script>
// Funções para copiar dados
function copiarEmail() {
    const email = '{{ $participante->email }}';
    navigator.clipboard.writeText(email).then(function() {
        mostrarNotificacao('Email copiado para a área de transferência!');
    });
}

function copiarTelefone() {
    const telefone = '{{ $participante->telefone }}';
    navigator.clipboard.writeText(telefone).then(function() {
        mostrarNotificacao('Telefone copiado para a área de transferência!');
    });
}

function copiarCpf() {
    const cpf = '{{ $participante->cpf }}';
    navigator.clipboard.writeText(cpf).then(function() {
        mostrarNotificacao('CPF copiado para a área de transferência!');
    });
}

function mostrarNotificacao(mensagem) {
    // Criar notificação
    const notificacao = document.createElement('div');
    notificacao.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
    notificacao.textContent = mensagem;
    document.body.appendChild(notificacao);
    
    // Remover após 3 segundos
    setTimeout(() => {
        notificacao.remove();
    }, 3000);
}

// Configuração para impressão
window.addEventListener('beforeprint', function() {
    document.title = 'Participante: {{ $participante->nome }}';
});

// Atalhos de teclado
document.addEventListener('keydown', function(event) {
    if (event.key === 'e' && event.ctrlKey) {
        event.preventDefault();
        window.location.href = '{{ route("participantes.edit", $participante) }}';
    }
    if (event.key === 'p' && event.ctrlKey) {
        event.preventDefault();
        window.print();
    }
});
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