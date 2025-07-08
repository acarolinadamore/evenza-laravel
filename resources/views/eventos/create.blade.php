{{-- 
ARQUIVO: resources/views/eventos/create.blade.php
DESCRIÇÃO: Formulário para criação de novos eventos
ROTA: /eventos/criar
--}}

@extends('layouts.app')

@section('titulo', 'Criar Novo Evento')

@section('conteudo')
<div class="container mx-auto px-4 py-8">
    <!-- Cabeçalho -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primario mb-2">Criar Novo Evento</h1>
            <p class="text-gray-600">Preencha os dados para criar um novo evento</p>
        </div>
        <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Formulário -->
    <div class="bg-white rounded-lg shadow-sm p-8">
        <form action="{{ route('eventos.store') }}" method="POST" class="space-y-6">
            @csrf
            
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
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                           placeholder="Ex: Workshop de Laravel">
                </div>

                <!-- Descrição -->
                <div class="lg:col-span-2">
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                        Descrição
                    </label>
                    <textarea id="descricao" name="descricao" rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                              placeholder="Descreva o evento, objetivos, público-alvo, etc."></textarea>
                </div>

                <!-- Data -->
                <div>
                    <label for="data_evento" class="block text-sm font-medium text-gray-700 mb-2">
                        Data do Evento *
                    </label>
                    <input type="date" id="data_evento" name="data_evento" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                </div>

                <!-- Hora -->
                <div>
                    <label for="hora_evento" class="block text-sm font-medium text-gray-700 mb-2">
                        Hora do Evento *
                    </label>
                    <input type="time" id="hora_evento" name="hora_evento" required 
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
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                               placeholder="Ex: Centro de Convenções, Sala de Reuniões, Online">
                    </div>

                    <!-- Endereço -->
                    <div>
                        <label for="endereco" class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço
                        </label>
                        <input type="text" id="endereco" name="endereco" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                               placeholder="Rua, número, bairro">
                    </div>

                    <!-- Cidade -->
                    <div>
                        <label for="cidade" class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade
                        </label>
                        <input type="text" id="cidade" name="cidade" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                               placeholder="Ex: Campo Grande">
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
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                               placeholder="Ex: 50">
                    </div>

                    <!-- Tipo de Evento -->
                    <div>
                        <label for="tipo_evento" class="block text-sm font-medium text-gray-700 mb-2">
                            Tipo de Evento
                        </label>
                        <select id="tipo_evento" name="tipo_evento" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="">Selecione o tipo</option>
                            <option value="workshop">Workshop</option>
                            <option value="palestra">Palestra</option>
                            <option value="reuniao">Reunião</option>
                            <option value="treinamento">Treinamento</option>
                            <option value="confraternizacao">Confraternização</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>
                        <select id="status" name="status" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario">
                            <option value="planejamento">Planejamento</option>
                            <option value="confirmado">Confirmado</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="realizado">Realizado</option>
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
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primario focus:border-primario"
                                  placeholder="Anotações para uso interno da equipe organizadora"></textarea>
                    </div>

                    <!-- Checkboxes -->
                    <div class="lg:col-span-2">
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="requer_confirmacao" name="requer_confirmacao" value="1" 
                                       class="w-4 h-4 text-primario border-gray-300 rounded focus:ring-primario">
                                <label for="requer_confirmacao" class="ml-2 text-sm text-gray-700">
                                    Requer confirmação de presença (RSVP)
                                </label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="evento_publico" name="evento_publico" value="1" 
                                       class="w-4 h-4 text-primario border-gray-300 rounded focus:ring-primario">
                                <label for="evento_publico" class="ml-2 text-sm text-gray-700">
                                    Evento público (visível para todos)
                                </label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" id="enviar_lembretes" name="enviar_lembretes" value="1" 
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
            <div class="border-t pt-6 flex flex-col sm:flex-row gap-4 justify-end">
                <a href="{{ route('eventos.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors text-center">
                    Cancelar
                </a>
                <button type="submit" class="bg-primario text-white px-6 py-3 rounded-lg hover:bg-primario_escuro transition-colors flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i>
                    Criar Evento
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Validação básica do formulário
    document.querySelector('form').addEventListener('submit', function(e) {
        const titulo = document.getElementById('titulo').value;
        const dataEvento = document.getElementById('data_evento').value;
        const horaEvento = document.getElementById('hora_evento').value;
        const local = document.getElementById('local').value;
        
        if (!titulo || !dataEvento || !horaEvento || !local) {
            e.preventDefault();
            alert('Por favor, preencha todos os campos obrigatórios (*).');
            return;
        }
        
        // Verificar se a data não é no passado
        const dataAtual = new Date();
        const dataSelecionada = new Date(dataEvento);
        
        if (dataSelecionada < dataAtual.setHours(0,0,0,0)) {
            e.preventDefault();
            alert('A data do evento não pode ser no passado.');
            return;
        }
    });
</script>
@endsection