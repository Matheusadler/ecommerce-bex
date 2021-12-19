<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request){
        $data = [];

        return view("venda", $data);
    }
}
