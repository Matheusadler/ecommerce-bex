<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/', [ProdutoController::class, 'home'])->name('home');
Route::match(['get', 'post'], '/home', [ProdutoController::class, 'home'])->name('home');
Route::match(['get', 'post'], '/produto', [ProdutoController::class, 'index'])->name('produto');
Route::match(['get', 'post'], '/venda', [VendaController::class, 'index'])->name('venda');
Route::match(['get', 'post'], '/indicador', [IndicadorController::class, 'index'])->name('indicador');
Route::match(['get', 'post'], '/relatorio', [RelatorioController::class, 'index'])->name('relatorio');
Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
Route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'verCarrinho'])->name('ver_carrinho');
Route::match(['get', 'post'], '/{indice}/excluircarrinho', [ProdutoController::class, 'excluirCarrinho'])->name('excluir_carrinho');
Route::post('/carrinho/finalizar', [ProdutoController::class, 'finalizar'])->name('finalizar_carrinho');
Route::match(['get', 'post'],'/vendas/historico', [ProdutoController::class, 'historico'])->name('venda_historico');
Route::post('/vendas/detalhes', [ProdutoController::class, 'detalhes'])->name('venda_detalhes');
Route::get('/indicador', [IndicadorController::class, 'indicador'])->name('indicador');
Route::get('/relatorio', [RelatorioController::class, 'index'])->name('relatorio');
