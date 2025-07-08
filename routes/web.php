<?php
// ARQUIVO: routes/web.php
// DESCRIÇÃO: Configuração das rotas principais do sistema
// FUNÇÃO: Definir redirecionamentos e rotas nomeadas

use Illuminate\Support\Facades\Route;

// Rota principal - redireciona para /site
Route::get('/', function () {
    return redirect()->route('site');
});

// Rota do site principal
Route::get('/site', function () {
    return view('site');
})->name('site');

// Rota do painel administrativo
Route::get('/painel', function () {
    return view('painel.dashboard'); // ou view('painel.index')
})->name('painel');

// Rotas de eventos
Route::prefix('eventos')->name('eventos.')->group(function () {
    Route::get('/', function () {
        return view('eventos.index');
    })->name('index');
    
    Route::get('/criar', function () {
        return view('eventos.create');
    })->name('create');
    
    Route::post('/', function () {
        // Simular criação de evento
        return redirect()->route('eventos.index')->with('sucesso', 'Evento criado com sucesso!');
    })->name('store');
    
    Route::get('/{id}', function ($id) {
        return view('eventos.show', compact('id'));
    })->name('show');
    
    Route::get('/{id}/editar', function ($id) {
        return view('eventos.edit', compact('id'));
    })->name('edit');
    
    Route::put('/{id}', function ($id) {
        // Simular atualização de evento
        return redirect()->route('eventos.index')->with('sucesso', 'Evento atualizado com sucesso!');
    })->name('update');
    
    Route::delete('/{id}', function ($id) {
        // Simular exclusão de evento
        return redirect()->route('eventos.index')->with('sucesso', 'Evento excluído com sucesso!');
    })->name('destroy');
});

// Rotas de participantes
Route::prefix('participantes')->name('participantes.')->group(function () {
    Route::get('/', function () {
        return view('participantes.index');
    })->name('index');
    
    Route::get('/criar', function () {
        return view('participantes.create');
    })->name('create');
    
    Route::get('/{id}', function ($id) {
        return view('participantes.show', compact('id'));
    })->name('show');
    
    Route::get('/{id}/editar', function ($id) {
        return view('participantes.edit', compact('id'));
    })->name('edit');
});

// Rotas de API ou AJAX (se necessário)
Route::prefix('api')->group(function () {
    // Adicionar rotas de API aqui se necessário
});

// Fallback para rotas não encontradas
Route::fallback(function () {
    return redirect()->route('site');
});