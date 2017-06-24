<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
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
          DB::table('answers')->insert([
             'answer_content' => str_random(10),
             'user_id' => rand(1,5),
             'question_id' => rand(1,50),
         ]);
        }
    }
}
