<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>valor</th>
    </tr>
    @php $total = 0; @endphp
    @foreach($listaProdutos as $produto)
    <tr>
        <td>{{ $produto->nome }}</td>
        <td>{{ $produto->valorproduto }}</td>
    </tr>
    @php $total += $produto->valorproduto; @endphp
    @endforeach
    <tfooter>
            <tr>
                <td colspan="5">
                    Total da venda: R$ {{ $total }}
                </td>
            </tr>
        <tfooter/>
</table>