@extends("layout")
@section("conteudo")

<div class="text-center border">Produtos Cadastrados</div>
    <table class="table border-collapse w-full mt-4">
        <thead>
            <tr class="flex rounded-lg text-sm font-medium text-gray-700 text-left table-row" style="font-size: 0.9674rem">
                <th class="px-4" style="background-color:#f8f8f8">Nome
                </th>
                <th class="px-4" style="background-color:#f8f8f8">Descrição
                </th>
                <th class="px-4" style="background-color:#f8f8f8">Preço
                </th>
                <th class="px-4" style="background-color:#f8f8f8">
                </th>
            </tr>
        </thead>
        <tbody class="">
            @include("_produtos", ['lista' => $lista])
        </tbody>
    </table>
</div>

@endsection