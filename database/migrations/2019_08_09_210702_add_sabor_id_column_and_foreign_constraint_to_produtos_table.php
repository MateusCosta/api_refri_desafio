<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaborIdColumnAndForeignConstraintToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
              $table->unsignedBigInteger('sabor_id'); 
              $table->foreign('sabor_id') 
                ->references('id') 
                ->on('sabores') 
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
             $table->dropForeign(['sabor_id']); 
             $table->dropColumn('sabor_id'); 
        });
    }
}
