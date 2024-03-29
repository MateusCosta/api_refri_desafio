<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Produto::class,100)->create();

        $produtos = factory(App\Produto::class, 9)->make();

        foreach ($produtos as $produto) {
            repeat:
            try {
                $produto->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $produto = factory(App\Produto::class)->make();
                goto repeat;
            }
        }
    }
}
