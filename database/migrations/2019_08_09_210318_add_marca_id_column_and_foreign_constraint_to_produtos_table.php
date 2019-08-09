<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarcaIdColumnAndForeignConstraintToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('marca_id'); 
            $table->foreign('marca_id') 
            ->references('id') 
            ->on('marcas') 
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
              $table->dropForeign(['marca_id']); 
              $table->dropColumn('marca_id'); 
        });
    }
}
