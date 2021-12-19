<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class RelatorioController extends Controller
{
    public function index(Request $request){   //listrar as vendas e seus relacionamtos

 
         return view('relatorio');
  
     }
}
