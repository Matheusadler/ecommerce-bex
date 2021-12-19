@extends("layout")
@section("scriptjs")
<script>
$(function(){
    $(".infovenda").on('click', function(){
        let id = $(this).attr("data-value")
        $.post('{{ route("venda_detalhes") }}', {idvenda : id}, (result) =>{
        $("#conteudovenda").html(result)
        })
    })
})
</script>
@endsection

@section("conteudo")

    <div class="text-center border text-gray-800 text-2xl col-12">
        Minhas vendas
    </div>

    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>Data da venda</th>
            </tr>
            @foreach($lista as $v)
            <tr>
                <td>{{ $v->datavenda }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infovenda" data-value="{{$v->id}}" data-toggle="modal" data-target="#modalvenda">Detalhes</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="modalvenda">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da venda</h5>
                </div>
                <div class="modal-body">
                    <div id="conteudovenda">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>

@endsection