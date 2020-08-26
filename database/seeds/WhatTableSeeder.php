<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create("zh_CN");
        $data = [];
        for($i = 0; $i< 100; $i++){
            $data[] = [
                'tag' => $faker->word,
                'onwhen' => $faker->dateTimeThisCentury,//date('Y-m-d H:i:s'),
                'who' => $faker->userName,
                'inwhere' => $faker->address,
                'withwho' => $faker->name,
                'what' => $faker->word,
                'opened'		=>		rand(0,1),
//                 'name' => $faker->name,
//                 'email' => $faker->unique()->safeEmail,
//                 'email_verified_at' => now(),
//                 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//                 'remember_token' => Str::random(10),
            ];
            
        }
        DB::table("what") -> insert($data);
    }
}
