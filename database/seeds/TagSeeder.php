<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Animals',
            'Football',
            'Cuisine',
            'Boxe',
            'City',
            'Mood',
            'House',
            'Celebrities',
            'Technology'
        ];

        foreach ($tags as $tag){
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        }
    }
}
