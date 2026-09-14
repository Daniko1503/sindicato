<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Página Inicial Pública (Exibe o banner flutuante se houver aviso visível)
Route::get('/', function () {
    $alerta = DB::table('alertas')->where('visivel', 1)->first();
    return view('index', compact('alerta'));
});

// Painel do Sistema (O novo layout que você enviou com a lista de avisos)
Route::get('/dashboard', function () {
    // Puxa todos os avisos cadastrados para listar no painel
    $avisos = DB::table('alertas')->orderBy('created_at', 'desc')->get();
    
    // Converte datas nativas em instâncias do Carbon para o diffForHumans() funcionar no banco SQLite
    $avisos = $avisos->map(function($aviso) {
        $aviso->created_at = \Carbon\Carbon::parse($aviso->created_at);
        return $aviso;
    });

    return view('dashboard', compact('avisos'));
})->name('dashboard');

// Formulário de Edição do Alerta
Route::get('/admin/alerta', function () {
    $alerta = DB::table('alertas')->first();
    return view('admin-alerta', compact('alerta'));
})->name('admin.alerta');

// Processa a atualização vinda do formulário administrativo
Route::post('/admin/alerta', function (Request $request) {
    DB::table('alertas')->where('id', 1)->update([
        'titulo' => $request->input('titulo'),
        'conteudo' => $request->input('conteudo'),
        'visivel' => $request->has('visivel') ? 1 : 0,
        'urgente' => $request->has('urgente') ? 1 : 0,
        'updated_at' => now(),
    ]);

    return redirect()->route('dashboard')->with('sucesso', 'Aviso atualizado com sucesso!');
})->name('admin.alerta.update');
