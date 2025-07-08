@extends('layouts.app')

@section('titulo', 'Editar Evento')

@section('conteudo')
<div class="container mx-auto px-4 py-8">
    <!-- Cabeçalho -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primario mb-2">Editar Evento</h1>
            <p class="text-gray-600">Atualize as informações do evento</p>
        </div>
        <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Voltar
        </a>
    </div>

    {{-- Simular dados do evento --}}
    @php
        $evento = (object) [
            'id' => $id,
            'titulo' => 'Workshop Laravel Avançado',
            'descricao' => 'Workshop prático sobre desenvolvimento avançado com Laravel, incluindo temas como API REST, autenticação, testes e deploy.',
            'data_evento' => '2025-01-15',
            'hora_evento' => '14:00',
            'local' => 'Centro de Convenções Campo Grande',
            'endereco' => 'Av. Brasil Central, 477',
            'cidade' => 'Campo Grande',
            'limite_participantes' => 50,
            'tipo_evento' => 'workshop',
            'status' => 'confirmado',
            'observacoes' => 'Trazer laptop com ambiente de desenvolvimento configurado',
            'requer_confirmacao' => true,
            'evento_publico' => true,
            'enviar_lembretes' => true
        ];
    @endphp

    <!-- Formulário -->
    <div class="bg-white rounded-lg shadow-sm p-8">
        <form action="{{ route('eventos.update', $evento->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Informações Básicas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="lg:col-span-2">
                    <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informações Básicas
                    </h2>
                </div>

                <!-- Título -->
                <div class="lg:col-span-2">
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                        Título do Evento *
                    </label>
                    <input type="text" id="titulo" name="titulo" required 
                           value="{{ $evento->titulo }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                </div>

                <!-- Descrição -->
                <div class="lg:col-span-2">
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                        Descrição
                    </label>
                    <textarea id="descricao" name="descricao" rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">{{ $evento->descricao }}</textarea>
                </div>

                <!-- Data -->
                <div>
                    <label for="data_evento" class="block text-sm font-medium text-gray-700 mb-2">
                        Data do Evento *
                    </label>
                    <input type="date" id="data_evento" name="data_evento" required 
                           value="{{ $evento->data_evento }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                </div>

                <!-- Hora -->
                <div>
                    <label for="hora_evento" class="block text-sm font-medium text-gray-700 mb-2">
                        Hora do Evento *
                    </label>
                    <input type="time" id="hora_evento" name="hora_evento" required 
                           value="{{ $evento->hora_evento }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                </div>
            </div>

            <!-- Localização -->
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Localização
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Local -->
                    <div class="lg:col-span-2">
                        <label for="local" class="block text-sm font-medium text-gray-700 mb-2">
                            Local do Evento *
                        </label>
                        <input type="text" id="local" name="local" required 
                               value="{{ $evento->local }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                    </div>

                    <!-- Endereço -->
                    <div>
                        <label for="endereco" class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço
                        </label>
                        <input type="text" id="endereco" name="endereco" 
                               value="{{ $evento->endereco }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                    </div>

                    <!-- Cidade -->
                    <div>
                        <label for="cidade" class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade
                        </label>
                        <input type="text" id="cidade" name="cidade" 
                               value="{{ $evento->cidade }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                    </div>
                </div>
            </div>

            <!-- Configurações do Evento -->
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-cogs mr-2"></i>
                    Configurações do Evento
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Limite de Participantes -->
                    <div>
                        <label for="limite_participantes" class="block text-sm font-medium text-gray-700 mb-2">
                            Limite de Participantes
                        </label>
                        <input type="number" id="limite_participantes" name="limite_participantes" min="1" 
                               value="{{ $evento->limite_participantes }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                    </div>

                    <!-- Tipo de Evento -->
                    <div>
                        <label for="tipo_evento" class="block text-sm font-medium text-gray-700 mb-2">
                            Tipo de Evento
                        </label>
                        <select id="tipo_evento" name="tipo_evento" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="">Selecione o tipo</option>
                            <option value="workshop" {{ $evento->tipo_evento == 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="palestra" {{ $evento->tipo_evento == 'palestra' ? 'selected' : '' }}>Palestra</option>
                            <option value="reuniao" {{ $evento->tipo_evento == 'reuniao' ? 'selected' : '' }}>Reunião</option>
                            <option value="treinamento" {{ $evento->tipo_evento == 'treinamento' ? 'selected' : '' }}>Treinamento</option>
                            <option value="confraternizacao" {{ $evento->tipo_evento == 'confraternizacao' ? 'selected' : '' }}>Confraternização</option>
                            <option value="outro" {{ $evento->tipo_evento == 'outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>
                        <select id="status" name="status" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="planejamento" {{ $evento->status == 'planejamento' ? 'selected' : '' }}>Planejamento</option>
                            <option value="confirmado" {{ $evento->status == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                            <option value="cancelado" {{ $evento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            <option value="realizado" {{ $evento->status == 'realizado' ? 'selected' : '' }}>Realizado</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Configurações Avançadas -->
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold text-primario mb-4 flex items-center">
                    <i class="fas fa-sliders-h mr-2"></i>
                    Configurações Avançadas
                </h2>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Observações -->
                    <div class="lg:col-span-2">
                        <label for="observacoes" class="block text-sm font-medium text-gray-700 mb-2">
                            Observações Internas
                        </label>
                        <textarea id="observacoes" name="observacoes" rows="3" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">{{ $evento->observacoes }}</textarea>
                    </div>

                    <!-- Checkboxes -->
                    <div class="lg:col-span-2">
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="requer_confirmacao" name="requer_confirmacao" value="1" 
                                       {{ $evento->requer_confirmacao ? 'checked' : '' }}
                                       class="w-4 h-4 text-primario border-gray-300 rounded focus:ring-primario">
                                <label for="requer_confirmacao" class="ml-2 text-sm text-gray-700">
                                    Requer confirmação de presença (RSVP)
                                </label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="evento_publico" name="evento_publico" value="1" 
                                       {{ $evento->evento_publico ? 'checked' : '' }}
                                       class="w-4 h-4 text-primario border-gray-300 rounded focus:ring-primario">
                                <label for="evento_publico" class="ml-2 text-sm text-gray-700">
                                    Evento público (visível para todos)
                                </label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="enviar_lembretes" name="enviar_lembretes" value="1" 
                                       {{ $evento->enviar_lembretes ? 'checked' : '' }}
                                       class="w-4 h-4 text-primario border-gray-300 rounded focus:ring-primario">
                                <label for="enviar_lembretes" class="ml-2 text-sm text-gray-700">
                                    Enviar lembretes automáticos
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões -->
            <div class="border-t pt-6 flex flex-col sm:flex-row gap-4 justify-between">
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors text-center">
                        Cancelar
                    </a>
                    <a href="{{ route('eventos.show', $evento->id) }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">
                        <i class="fas fa-eye mr-2"></i>
                        Visualizar
                    </a>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="button" onclick="confirmarExclusao()" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-trash mr-2"></i>
                        Excluir Evento
                    </button>
                    <button type="submit" class="bg-primario text-white px-6 py-3 rounded-lg hover:bg-primario_escuro transition-colors flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Formulário oculto para exclusão -->
<form id="form-exclusao" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    // Validação do formulário
    document.querySelector('form').addEventListener('submit', function(e) {
        if (e.target.id === 'form-exclusao') return; // Não validar form de exclusão
        
        const titulo = document.getElementById('titulo').value;
        const dataEvento = document.getElementById('data_evento').value;
        const horaEvento = document.getElementById('hora_evento').value;
        const local = document.getElementById('local').value;
        
        if (!titulo || !dataEvento || !horaEvento || !local) {
            e.preventDefault();
            alert('Por favor, preencha todos os campos obrigatórios (*).');
            return;
        }
    });

    // Confirmar exclusão
    function confirmarExclusao() {
        if (confirm('Tem certeza que deseja excluir este evento?\n\nEsta ação não pode ser desfeita e todos os dados relacionados serão perdidos.')) {
            document.getElementById('form-exclusao').submit();
        }
    }
</script>
@endsection