<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker\Factory::create();

         $images=[
            'https://static-01.daraz.com.bd/p/8aece7dc3bb51c528d0c81406def8425.jpg_750x750.jpg',
            'https://static-01.daraz.com.bd/p/dae8d38a43a1c5dc4f203405a9e38720.jpg_750x750.jpg',
            'https://static-01.daraz.com.bd/p/eeb9cc040152f1f8b05938e0a39ab869.png_750x750.jpg',
            'https://static-01.daraz.com.bd/p/13488fbe7e16840179c3d02afd89667d.jpg_750x750.jpg_.webp'

         ];

        foreach (range(1,100) as $key=>$value){
             $name = $faker->unique()->name;
             Product::create([
                   'name'=>$name,
                   'slug'=>Str::slug($name),
                   'short_description'=>$faker->text(100),
                   'long_description'=>$faker->text(300),
                   'regular_price'=>$faker->numberBetween(100,500),
                   'sale_price'=>$faker->numberBetween(50,300),
                   'image'=>$images[rand(0,3)],
                   'images'=>'1.png',
                   'category_id'=>$faker->numberBetween(1,10),


             ]);

        }
    }
}
