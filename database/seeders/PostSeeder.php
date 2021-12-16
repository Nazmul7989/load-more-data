<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create = Factory::create();

        foreach (range(1,100) as $index){
            DB::table('posts')->insert([
                'name' => $create->text(30),
                'description' => $create->text(100)
            ]);
        }
    }
}
