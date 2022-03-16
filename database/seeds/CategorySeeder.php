<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'baju'
        ]);

        DB::table('categories')->insert([
            'name' => 'celana'
        ]);

        DB::table('categories')->insert([
            'name' => 'daster'
        ]);

        DB::table('categories')->insert([
            'name' => 'jeans'
        ]);

        DB::table('categories')->insert([
            'name' => 'jaket'
        ]);
    }
}
