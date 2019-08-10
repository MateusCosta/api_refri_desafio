<?php

use Illuminate\Database\Seeder;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $marcas = factory(App\Marca::class, 9)->create();

        // foreach ($marcas as $marca) {
        //     repeat:
        //     try {
        //         $marca->save();
        //     } catch (\Illuminate\Database\QueryException $e) {
        //         $marca->
        //         $marca = factory(App\Marca::class)->make();
        //         goto repeat;
        //     }
        // }
    }
}
