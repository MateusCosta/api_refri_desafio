<?php

use Illuminate\Database\Seeder;

class SaborTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sabores = factory(App\Sabor::class, 1)->make();

        foreach ($sabores as $sabor) {
            repeat:
            try {
                $sabor->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $sabor = factory(App\Sabor::class)->make();
                goto repeat;
            }
        }
    }
}
