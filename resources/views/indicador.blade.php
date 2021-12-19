@extends("layout")
@section("conteudo")
<div class="my-2">

    <div class="border-info-800 my-2  " title="Indicadores">
        <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">
            <p class="">Produto Mais Caro</p>
            <p class="font-bold-500 text-xl">{{ $produtoMaisCaro ? json_decode($produtoMaisCaro)->nome.' R$ '.json_decode($produtoMaisCaro)->valor : 'Não existe produto' }} </p>
        </div>
        <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">
            <p class="">Produto Mais Barato</p>
            <p class="font-bold-500 text-xl">{{ $produtoMaisBarato ? json_decode($produtoMaisBarato)->nome.' R$ '.json_decode($produtoMaisBarato)->valor : 'Não existe produto'}} </p>
        </div>
        <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">
            <p class="">Produto Mais Vendido</p>
            <p class="font-bold-500 text-xl">{{ $maisVendido ? json_decode($maisVendido)->nome : 'Não existe produto'}} </p>
        </div>
        <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">
            <p class="">Quantidade de Produtos Cadastrado</p>
            <p class="font-bold-500 text-xl">{{ $totalProduto }}</p>
        </div>
    <div>
</div>
@endsection