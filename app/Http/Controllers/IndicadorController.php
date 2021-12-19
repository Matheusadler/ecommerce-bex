<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\ProdutoVenda;

class IndicadorController extends Controller
{
    public function index(Request $request){
        $data = [];
        
        return view("indicador", $data);
    }

    public int $totalProduto;
    public string $produtoMaisCaro;
    public string $maisVendido;
    public string $produtoMaisBarato;
    public string $prodMaisVendido;

    public function indicador()
    {
        $data = [];
        $this->totalProduto = Produto::count();

        $this->produtoMaisCaro = Produto::select('nome','valor')
                                                        ->orderBy('valor','desc')->first();

        $this->produtoMaisBarato = Produto::select('nome','valor')
                                                        ->orderBy('valor','asc')->first();

        $this->maisVendido = ProdutoVenda::select('produto_id')
                                                        ->orderBy('quantidade','desc')->first();
        $id = substr($this->maisVendido, -2, 1); 
        $this->prodMaisVendido = Produto::where('id', $id)->get('nome')->first();

        //dd($this->produtoMaisCaro);
        $data['maisVendido'] = $this->prodMaisVendido;
        $data['produtoMaisBarato'] = $this->produtoMaisBarato;
        $data['produtoMaisCaro'] = $this->produtoMaisCaro;
        $data['totalProduto'] = $this->totalProduto;

        return view("indicador", $data);
    }
}
