<?php

use Illuminate\Database\Seeder;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = factory(App\Unidade::class, 2)->make();

        foreach ($unidades as $unidade) {
            repeat:
            try {
                $unidade->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $unidade = factory(App\Unidade::class)->make();
                goto repeat;
            }
        }
    }
}
