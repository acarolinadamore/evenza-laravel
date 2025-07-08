@extends('layouts.app')

@section('titulo', 'Evenza - Início')

@section('conteudo')
<!-- Seção Hero -->
<div class="bg-gradient-to-r from-gray-900 to-gray-700 text-white rounded-lg mb-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 px-8 py-16 text-center">
        <h1 class="titulo-principal text-5xl md:text-6xl mb-6">Evenza</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-4xl mx-auto">
            A solução completa para facilitar a gestão de eventos corporativos, reuniões estratégicas, webaulas e confraternizações.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="botao-evenza text-center">
                <i class="fas fa-calendar mr-2"></i>
                Ver Eventos
            </a>
            <a href="#" class="bg-yellow-600 text-white px-6 py-3 rounded hover:bg-yellow-700 transition-colors text-center">
                <i class="fas fa-plus mr-2"></i>
                Criar Evento
            </a>
        </div>
    </div>
</div>

<!-- Estatísticas Rápidas -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="text-3xl text-blue-600 mb-2">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-1">Total Eventos</h3>
        <p class="text-3xl font-bold text-blue-600">{{ $totalEventos }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="text-3xl text-green-600 mb-2">
            <i class="fas fa-users"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-1">Participantes</h3>
        <p class="text-3xl font-bold text-green-600">{{ $totalParticipantes }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="text-3xl text-purple-600 mb-2">
            <i class="fas fa-calendar-day"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-1">Este Mês</h3>
        <p class="text-3xl font-bold text-purple-600">{{ $eventosEsteMs }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="text-3xl text-orange-600 mb-2">
            <i class="fas fa-clock"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-1">Próximos</h3>
        <p class="text-3xl font-bold text-orange-600">{{ $proximosEventos }}</p>
    </div>
</div>

<!-- Funcionalidades Principais -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
    <!-- Gerenciar Eventos -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
                <i class="fas fa-calendar-check text-2xl text-blue-600"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Gerenciar Eventos</h2>
        </div>
        <p class="text-gray-600 mb-6">
            Crie, edite e organize seus eventos de forma simples e eficiente.
        </p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="#" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded text-center hover:bg-blue-700 transition-colors">
                <i class="fas fa-list mr-2"></i>
                Ver Todos
            </a>
            <a href="#" class="flex-1 bg-green-600 text-white px-4 py-2 rounded text-center hover:bg-green-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>
                Novo Evento
            </a>
        </div>
    </div>

    <!-- Gerenciar Participantes -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="flex items-center mb-6">
            <div class="bg-green-100 p-3 rounded-full mr-4">
                <i class="fas fa-users text-2xl text-green-600"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Gerenciar Participantes</h2>
        </div>
        <p class="text-gray-600 mb-6">
            Cadastre e gerencie informações dos participantes dos seus eventos.
        </p>
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="#" class="flex-1 bg-green-600 text-white px-4 py-2 rounded text-center hover:bg-green-700 transition-colors">
                <i class="fas fa-list mr-2"></i>
                Ver Todos
            </a>
            <a href="#" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded text-center hover:bg-blue-700 transition-colors">
                <i class="fas fa-user-plus mr-2"></i>
                Novo Participante
            </a>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-yellow-600 to-yellow-500 text-white rounded-lg p-8 text-center">
    <h2 class="text-3xl font-bold mb-4">Comece agora!</h2>
    <p class="text-xl mb-6 max-w-2xl mx-auto">
        Facilite a gestão dos seus eventos com uma plataforma que oferece eficiência, controle e praticidade.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#" class="bg-white text-yellow-600 px-6 py-3 rounded font-semibold hover:bg-gray-100 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Criar Primeiro Evento
        </a>
        <a href="#" class="bg-yellow-700 text-white px-6 py-3 rounded font-semibold hover:bg-yellow-800 transition-colors">
            <i class="fas fa-user-plus mr-2"></i>
            Cadastrar Participante
        </a>
    </div>
</div>
@endsection