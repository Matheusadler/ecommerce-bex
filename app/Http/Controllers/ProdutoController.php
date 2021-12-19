<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\ProdutoVenda;
use App\Services\VendaService;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];

        $listaProdutos = \App\Models\Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function home(Request $request){

        return view("welcome");
    }


    public function adicionarCarrinho($idProduto = 0, Request $request){
        //Buscar produto pelo id
        $prod = Produto::find($idProduto);

        //se achar produto
        if($prod){
            //Buscar da sessão o carrinho atual
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session([ 'cart' => $carrinho]);
            }

        return redirect()->route('home');
    }

    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view('carrinho', $data); 
    }

    public function excluirCarrinho($indice, Request $request){
        $carrinho = session('cart', []);
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);
        return redirect()->route("ver_carrinho");
    }

    public function finalizar(Request $request){
        $prods = session('cart', []);
        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda($prods);
        if($result["status"] == "ok"){
            $request->session()->forget("cart");
        }

        $request->session()->flash($result["status"], $result["message"]);
        //dd("Teste");
        return redirect()->route("ver_carrinho");
    }

    public function historico(Request $request){
        $data = [];
        $carrinho = session('cart', []);
        $cart = ['cart' => $carrinho];
        $listaVenda = Venda::orderBy("datavenda", "desc")
            ->get();
        
        $data["lista"] = $listaVenda;

        return view("historico", $data, $cart);
    }

    public function detalhes(Request $request){
        $idvenda = $request->input("idvenda");
        $listaProdutos = ProdutoVenda::join("produtos", "produtos.id", "=", "produto_vendas.produto_id")
                                ->where("venda_id", $idvenda)
                                ->get(['produto_vendas.*', 'produto_vendas.valor as valorproduto', 'produtos.*']);

        $data = [];
        $data["listaProdutos"] = $listaProdutos;
        return view("detalhes", $data);
    }
}
