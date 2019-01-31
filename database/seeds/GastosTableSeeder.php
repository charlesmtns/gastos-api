<?php

use Illuminate\Database\Seeder;

class GastosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gasto::class, 5)->create()->each(function ($gasto) {

            $gasto->tags()->save(factory(\App\Tag::class)->make());
        });
    }
}
