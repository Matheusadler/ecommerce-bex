<?php

namespace App\Models;

class ProdutoVenda extends RModel
{
    protected $table = "produto_vendas";

    protected $fillable = ['quantidade', 'valor', 'dt_venda', 'produto_id', 'venda_id'];
}
