<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Finance'
            ],
            [
                'name' => 'Abroad'
            ],
            [
                'name' => 'Sport'
            ],
            [
                'name' => 'Actuality'
            ],
            [
                'name' => 'Science'
            ],
        ];

        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
