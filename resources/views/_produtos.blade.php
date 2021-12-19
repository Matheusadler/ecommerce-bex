@if(isset($lista))
    @foreach($lista as $prod)
        <tr class="col">
            <td class="px-4 py-1">{{ $prod->nome }}</td>
            <td class="px-4 py-1">{{ $prod->descricao }}</td>
            <td class="px-4 py-1">{{ $prod->valor }}</td>
            <td class="px-4 py-1"><a href="{{ route('adicionar_carrinho', ['idproduto' => $prod->id]) }}" 
                class="btn btn-sm btn-primary">Adicionar produto</a></td>
        </tr>
    @endforeach
@endif