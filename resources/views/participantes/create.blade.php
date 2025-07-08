@extends('layouts.app')

@section('titulo', 'Cadastrar Participante')

@section('conteudo')
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8">
    <h1 class="titulo-principal text-4xl text-gray-800 mb-4 lg:mb-0">Cadastrar Participante</h1>
    <a href="{{ route('participantes.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700 transition-colors">
        <i class="fas fa-arrow-left mr-2"></i>
        Voltar para Lista
    </a>
</div>

<!-- Formulário -->
<div class="bg-white rounded-lg shadow-md p-8">
    <form method="POST" action="{{ route('participantes.store') }}" class="space-y-6">
        @csrf

        <!-- Nome -->
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                Nome Completo <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="nome" 
                   name="nome" 
                   value="{{ old('nome') }}"
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
                       value="{{ old('email') }}"
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
                       value="{{ old('telefone') }}"
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
                   value="{{ old('cpf') }}"
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
                      placeholder="Informações adicionais sobre o participante...">{{ old('observacao') }}</textarea>
            @error('observacao')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botões -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6">
            <button type="submit" class="botao-evenza flex-1 sm:flex-none text-center">
                <i class="fas fa-save mr-2"></i>
                Cadastrar Participante
            </button>
            <a href="{{ route('participantes.index') }}" 
               class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-600 transition-colors text-center">
                <i class="fas fa-times mr-2"></i>
                Cancelar
            </a>
        </div>
    </form>
</div>

<!-- Dicas -->
<div class="bg-green-50 rounded-lg p-6 mt-6">
    <h3 class="text-lg font-semibold text-green-800 mb-3">
        <i class="fas fa-lightbulb mr-2"></i>
        Dicas para cadastrar participantes
    </h3>
    <ul class="space-y-2 text-green-700">
        <li class="flex items-start">
            <i class="fas fa-check-circle mt-1 mr-2 text-green-500"></i>
            <strong>Nome completo:</strong> Informe o nome completo para facilitar a identificação
        </li>
        <li class="flex items-start">
            <i class="fas fa-check-circle mt-1 mr-2 text-green-500"></i>
            <strong>Email:</strong> Essencial para envio de convites e comunicações
        </li>
        <li class="flex items-start">
            <i class="fas fa-check-circle mt-1 mr-2 text-green-500"></i>
            <strong>Telefone:</strong> Importante para contato direto em caso de emergência
        </li>
        <li class="flex items-start">
            <i class="fas fa-check-circle mt-1 mr-2 text-green-500"></i>
            <strong>CPF:</strong> Pode ser necessário para eventos corporativos ou cadastros específicos
        </li>
        <li class="flex items-start">
            <i class="fas fa-check-circle mt-1 mr-2 text-green-500"></i>
            <strong>Observação:</strong> Use para informações como preferências alimentares, necessidades especiais, etc.
        </li>
    </ul>
</div>

<!-- Campos Obrigatórios -->
<div class="bg-blue-50 rounded-lg p-6 mt-6">
    <h3 class="text-lg font-semibold text-blue-800 mb-3">
        <i class="fas fa-info-circle mr-2"></i>
        Informações Importantes
    </h3>
    <div class="space-y-2 text-blue-700">
        <p class="flex items-start">
            <i class="fas fa-asterisk mt-1 mr-2 text-red-500 text-xs"></i>
            <strong>Campos obrigatórios:</strong> Apenas o nome é obrigatório
        </p>
        <p class="flex items-start">
            <i class="fas fa-shield-alt mt-1 mr-2 text-blue-500"></i>
            <strong>Privacidade:</strong> Todos os dados são protegidos e usados apenas para gestão de eventos
        </p>
        <p class="flex items-start">
            <i class="fas fa-edit mt-1 mr-2 text-blue-500"></i>
            <strong>Edição:</strong> Você pode editar essas informações a qualquer momento
        </p>
    </div>
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
    
    // Validação em tempo real do email
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('blur', function(e) {
        const email = e.target.value;
        if (email && !isValidEmail(email)) {
            e.target.classList.add('border-red-500');
            showError(e.target, 'Por favor, insira um email válido');
        } else {
            e.target.classList.remove('border-red-500');
            hideError(e.target);
        }
    });
    
    // Contador de caracteres para observação
    const observacaoInput = document.getElementById('observacao');
    const maxLength = 500;
    
    // Criar contador
    const counter = document.createElement('p');
    counter.className = 'text-sm text-gray-500 mt-1';
    counter.textContent = `0/${maxLength} caracteres`;
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

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showError(element, message) {
    hideError(element);
    const errorElement = document.createElement('p');
    errorElement.className = 'mt-1 text-sm text-red-600 error-message';
    errorElement.textContent = message;
    element.parentNode.appendChild(errorElement);
}

function hideError(element) {
    const errorElement = element.parentNode.querySelector('.error-message');
    if (errorElement) {
        errorElement.remove();
    }
}
</script>
@endsection