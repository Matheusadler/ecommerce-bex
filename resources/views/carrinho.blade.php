@extends("layout")
@section("conteudo")

    <h2>Carrinho</h2>
    @if(isset($cart) && count($cart) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $indice => $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td>{{ $c->valor }}</td>
                    <td>{{ $c->descricao }}</td>
                    <td>
                        <a href="{{ route('excluir_carrinho', ['indice' => $indice]) }}" class="btn btn-danger">
                            Remover produto
                        </a>
                    </td>
                </tr>
                @php $total += $c->valor; @endphp
            @endforeach
        </tbody>
        <tfooter>
            <tr>
                <td colspan="5">
                    Total da venda: R$ {{ $total }}
                </td>
            </tr>
        <tfooter/>
    </table>

    <form action="{{ route('finalizar_carrinho') }}" method="post">
        @csrf
        <input type="submit" value="Finalizar Venda" class="btn btn-lg btn-success"> 
    </form>

    @else
        <p>Nenhum produto no carrinho</p>
    @endif

@endsection