<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=50;$i++){
          DB::table('questions')->insert([
             'question_content' => str_random(10),
             'vote_id' => rand(1,10),
         ]);
        }

    }
}
