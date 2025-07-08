<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Evenza - Gestão de Eventos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Yesteryear&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primario: '#1a1a1a',
                        primario_escuro: '#000000',
                        secundario: '#333333',
                        acento: '#ad8741',
                        claro: '#f8f9fa',
                        escuro: '#212529',
                        cinza: '#6c757d'
                    },
                    fontFamily: {
                        'titulo': ['Yesteryear', 'cursive'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Menu de Navegação -->
    <nav class="bg-gray-900 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('painel') }}" class="flex items-center text-white text-2xl font-bold hover:text-yellow-400 transition-colors">
                    <i class="fas fa-calendar-check mr-2"></i>
                    <span class="font-titulo">Evenza</span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('painel') }}" class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i> Início
                    </a>
                    <a href="{{ route('eventos.index') }}" class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center">
                        <i class="fas fa-calendar mr-2"></i> Eventos
                    </a>
                    <a href="{{ route('eventos.create') }}" class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center">
                        <i class="fas fa-plus mr-2"></i> Novo Evento
                    </a>
                    <a href="{{ route('participantes.index') }}" class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center">
                        <i class="fas fa-users mr-2"></i> Participantes
                    </a>
                    <a href="{{ route('participantes.create') }}" class="text-white hover:text-yellow-400 transition-colors font-medium flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Novo Participante
                    </a>
                </div>

                <!-- Botão Menu Mobile -->
                <div class="md:hidden">
                    <button id="menu-mobile" class="text-white text-xl">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile Expandido -->
            <div id="menu-mobile-conteudo" class="hidden md:hidden pb-4 space-y-2">
                <a href="{{ route('painel') }}" class="block text-white py-2 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-home mr-2"></i> Início
                </a>
                <a href="{{ route('eventos.index') }}" class="block text-white py-2 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-calendar mr-2"></i> Eventos
                </a>
                <a href="{{ route('eventos.create') }}" class="block text-white py-2 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-plus mr-2"></i> Novo Evento
                </a>
                <a href="{{ route('participantes.index') }}" class="block text-white py-2 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-users mr-2"></i> Participantes
                </a>
                <a href="{{ route('participantes.create') }}" class="block text-white py-2 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-user-plus mr-2"></i> Novo Participante
                </a>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Mensagens de Flash -->
        @if(session('sucesso'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    <span>{{ session('sucesso') }}</span>
                </div>
            </div>
        @endif

        @if(session('erro'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <span>{{ session('erro') }}</span>
                </div>
            </div>
        @endif

        <!-- Conteúdo das páginas -->
        @yield('conteudo')
    </main>

    <!-- Rodapé -->
    <footer class="bg-gray-900 text-white py-8 mt-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0 text-center md:text-left">
                    <h3 class="text-xl font-bold font-titulo">Evenza</h3>
                    <p class="text-gray-400">Transformando a gestão de eventos</p>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <div class="border-t border-gray-700 pt-4 md:border-t-0 md:pt-0">
                        <p class="text-gray-400 text-sm">
                            &copy; {{ date('Y') }} Evenza. Todos os direitos reservados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Controle do Menu Mobile
        document.getElementById('menu-mobile').addEventListener('click', function() {
            const menuConteudo = document.getElementById('menu-mobile-conteudo');
            menuConteudo.classList.toggle('hidden');
        });

        // Auto-hide das mensagens flash
        setTimeout(function() {
            const alertas = document.querySelectorAll('.bg-green-100, .bg-red-100');
            alertas.forEach(function(alerta) {
                alerta.style.opacity = '0';
                alerta.style.transition = 'opacity 0.3s ease';
                setTimeout(function() {
                    alerta.remove();
                }, 300);
            });
        }, 5000);
    </script>
</body>
</html>