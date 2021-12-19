<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_vendas', function (Blueprint $table) {
            $table->increments("id");

            $table->integer("quantidade");
            $table->decimal("valor", 10, 2);
            $table->datetime("dt_venda");

            $table->integer("produto_id")->unsigned();
            $table->integer("venda_id")->unsigned();

            $table->timestamps();

            $table->foreign("produto_id")
                ->references("id")->on("produtos")
                ->onDelete("cascade");

            $table->foreign("venda_id")
                ->references("id")->on("vendas")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_vendas');
    }
}
