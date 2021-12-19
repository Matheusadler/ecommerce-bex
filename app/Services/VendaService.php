<?php

namespace App\Services;
use Log;
use App\Models\Usuarios;
use App\Models\Venda;
use App\Models\ProdutoVenda;

class VendaService {

    public function finalizarVenda($prods = []){
        try{
            \DB::beginTransaction();
            $dtHoje = new \DateTime();

            $venda = new Venda();

            $venda->datavenda = $dtHoje->format('Y-m-d H:i:s');
            
            $venda->save();
            foreach($prods as $p){
                $produtos = new ProdutoVenda();
                $produtos->quantidade = 1;
                $produtos->valor = $p->valor;
                $produtos->dt_venda = $dtHoje->format('Y-m-d H:i:s');
                $produtos->produto_id = $p->id;
                $produtos->venda_id = $venda->id;
                $produtos->save();
            }
            
            \DB::commit();
            return ['status' => 'ok', 'message' => 'Venda finalizada com sucesso'];
        }catch(\Exception $e){
            \DB::rollback();
            Log::error("ERRO:VENDA SERVICE", ['message' => $e->getMessage()]);
            return ['status' => 'err', 'message' => 'Venda não pode ser finalizada'];
        }
    }

}