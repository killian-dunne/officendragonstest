<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new \App\Tag([
            'text' => 'startup',
            'category' => 'Size'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'SME',
            'category' => 'Size'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'large',
            'category' => 'Size'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'monopoly',
            'category' => 'Size'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'Ireland',
            'category' => 'Location'
        ]); 
        $tag->save();


        $tag = new \App\Tag([
            'text' => 'UK',
            'category' => 'Location'
        ]); 
        $tag->save();


        $tag = new \App\Tag([
            'text' => 'US',
            'category' => 'Location'
        ]); 
        $tag->save();


        $tag = new \App\Tag([
            'text' => 'China',
            'category' => 'Location'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'basic',
            'category' => 'Subscription'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'gola',
            'category' => 'Subscription'
        ]); 
        $tag->save();

        $tag = new \App\Tag([
            'text' => 'platinum',
            'category' => 'Subscription'
        ]); 
        $tag->save();

    }
}
