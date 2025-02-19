<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoris = [
            'Historical Books',
            'Thriller',
            'Children s Literature',
            'Poetry',
            'Biographies',
            'Islamic Book',
        ];
        foreach($categoris as $key=> $value){
            Category::create( [
                'name'=>$value,
                'slug'=>Str::slug($value),
                'image'=>'1.png',
                'status'=>rand(0,1),

            ]
            );
        }
    }
}
