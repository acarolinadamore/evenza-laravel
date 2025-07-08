@extends('layouts.app')

@section('titulo', 'Editar Participante')

@section('conteudo')
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
    <h1 class="titulo-principal text-4xl text-gray-800 mb-4 lg:mb-0">Editar Participante</h1>
    <div class="flex gap-3">
        <a href="{{ route('participantes.show', $participante) }}" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition-colors">
            <i class="fas fa-eye mr-2"></i>
            Visualizar
        </a>
        <a href="{{ route('participantes.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Voltar para Lista
        </a>
    </div>
</div>

<!-- Formulário -->
<div class="bg-white rounded-lg shadow-md p-8">
    <form method="POST" action="{{ route('participantes.update', $participante) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                Nome Completo <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="nome" 
                   name="nome" 
                   value="{{ old('nome', $participante->nome) }}"
                   required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('nome') border-red-500 @enderror"
                   placeholder="Digite o nome completo do participante">
            @error('nome')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email e Telefone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $participante->email) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror"
                       placeholder="exemplo@email.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telefone -->
            <div>
                <label for="telefone" class="block text-sm font-medium text-gray-700 mb-2">
                    Telefone
                </label>
                <input type="tel" 
                       id="telefone" 
                       name="telefone" 
                       value="{{ old('telefone', $participante->telefone) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('telefone') border-red-500 @enderror"
                       placeholder="(67) 99999-9999">
                @error('telefone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- CPF -->
        <div>
            <label for="cpf" class="block text-sm font-medium text-gray-700 mb-2">
                CPF
            </label>
            <input type="text" 
                   id="cpf" 
                   name="cpf" 
                   value="{{ old('cpf', $participante->cpf) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('cpf') border-red-500 @enderror"
                   placeholder="000.000.000-00"
                   maxlength="14">
            @error('cpf')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Observação -->
        <div>
            <label for="observacao" class="block text-sm font-medium text-gray-700 mb-2">
                Observação
            </label>
            <textarea id="observacao" 
                      name="observacao" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('observacao') border-red-500 @enderror"
                      placeholder="Informações adicionais sobre o participante...">{{ old('observacao', $participante->observacao) }}</textarea>
            @error('observacao')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botões -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6">
            <button type="submit" class="botao-evenza flex-1 sm:flex-none text-center">
                <i class="fas fa-save mr-2"></i>
                Atualizar Participante
            </button>
            <a href="{{ route('participantes.show', $participante) }}" 
               class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition-colors text-center">
                <i class="fas fa-eye mr-2"></i>
                Visualizar
            </a>
            <a href="{{ route('participantes.index') }}" 
               class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600 transition-colors text-center">
                <i class="fas fa-times mr-2"></i>
                Cancelar
            </a>
        </div>
    </form>
</div>

<!-- Histórico de Alterações -->
<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        <i class="fas fa-history mr-2"></i>
        Histórico do Participante
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
    </div>
</div>

<!-- Informações de Contato -->
<div class="bg-blue-50 rounded-lg p-6 mt-6">
    <h3 class="text-lg font-semibold text-blue-800 mb-3">
        <i class="fas fa-address-card mr-2"></i>
        Informações de Contato Atuais
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex items-center">
            <i class="fas fa-envelope mr-3 text-blue-600"></i>
            <div>
                <strong class="text-blue-700">Email:</strong>
                <p class="text-blue-600">
                    @if($participante->email)
                        <a href="mailto:{{ $participante->email }}" class="hover:underline">{{ $participante->email }}</a>
                    @else
                        <span class="text-gray-500 italic">Não informado</span>
                    @endif
                </p>
            </div>
        </div>
        
        <div class="flex items-center">
            <i class="fas fa-phone mr-3 text-green-600"></i>
            <div>
                <strong class="text-blue-700">Telefone:</strong>
                <p class="text-blue-600">
                    @if($participante->telefone)
                        <a href="tel:{{ $participante->telefone }}" class="hover:underline">{{ $participante->telefone }}</a>
                    @else
                        <span class="text-gray-500 italic">Não informado</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Ações Perigosas -->
<div class="bg-red-50 rounded-lg p-6 mt-6">
    <h3 class="text-lg font-semibold text-red-800 mb-3">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        Ações Perigosas
    </h3>
    <p class="text-red-700 mb-4">
        Esta ação não pode ser desfeita. Todos os dados do participante serão perdidos permanentemente.
    </p>
    <form method="POST" action="{{ route('participantes.destroy', $participante) }}" 
          onsubmit="return confirm('Tem certeza que deseja excluir este participante? Esta ação não pode ser desfeita!\n\nParticipante: {{ $participante->nome }}')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded hover:bg-red-700 transition-colors">
            <i class="fas fa-trash mr-2"></i>
            Excluir Participante
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus no primeiro campo
    document.getElementById('nome').focus();
    
    // Máscara para CPF
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }
        e.target.value = value;
    });
    
    // Máscara para telefone
    const telefoneInput = document.getElementById('telefone');
    telefoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            if (value.length <= 10) {
                value = value.replace(/(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                value = value.replace(/(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }
        }
        e.target.value = value;
    });
    
    // Destacar campos alterados
    const campos = ['nome', 'email', 'telefone', 'cpf', 'observacao'];
    campos.forEach(campo => {
        const elemento = document.getElementById(campo);
        if (elemento) {
            const valorOriginal = elemento.value;
            elemento.addEventListener('input', function() {
                if (this.value !== valorOriginal) {
                    this.classList.add('border-yellow-400', 'bg-yellow-50');
                } else {
                    this.classList.remove('border-yellow-400', 'bg-yellow-50');
                }
            });
        }
    });
    
    // Contador de caracteres para observação
    const observacaoInput = document.getElementById('observacao');
    const maxLength = 500;
    
    // Criar contador
    const counter = document.createElement('p');
    counter.className = 'text-sm text-gray-500 mt-1';
    counter.textContent = `${observacaoInput.value.length}/${maxLength} caracteres`;
    observacaoInput.parentNode.appendChild(counter);
    
    observacaoInput.addEventListener('input', function(e) {
        const length = e.target.value.length;
        counter.textContent = `${length}/${maxLength} caracteres`;
        
        if (length > maxLength) {
            counter.classList.add('text-red-500');
            counter.classList.remove('text-gray-500');
        } else {
            counter.classList.remove('text-red-500');
            counter.classList.add('text-gray-500');
        }
    });
});
</script>
@endsection