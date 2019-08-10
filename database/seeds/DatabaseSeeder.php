<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(MarcaTableSeeder::class);
        $this->call(SaborTableSeeder::class);
        $this->call(UnidadeTableSeeder::class);
        $this->call(TipoTableSeeder::class);
        $this->call(ProdutosTableSeeder::class);
       }
}
