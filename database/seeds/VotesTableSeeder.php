<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=10;$i++){
          DB::table('votes')->insert([
             'vote_name' => str_random(10),
             'user_id' => rand(1,5),
         ]);
        }

    }
}
