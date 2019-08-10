<?php

use Illuminate\Database\Seeder;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = factory(App\Tipo::class, 3)->make();

        foreach ($tipos as $tipo) {
            repeat:
            try {
                $tipo->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $tipo = factory(App\Tipo::class)->make();
                goto repeat;
            }
        }
    }
}
