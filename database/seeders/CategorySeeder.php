<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array =[

            ['name' => 'category 1'],
            ['name' => 'category 2'],
            ['name' => 'category 3'],
            ['name' => 'category 4'],
            ['name' => 'category 5'],
            ['name' => 'category 6'],
            ['name' => 'category 7'],
            ['name' => 'category 8'],
            ['name' => 'category 9'],
            ['name' => 'category 10'],
       

        ];
        foreach($array as  $value){
         Category::create($value);
        }
    }
}
