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
            'https://img.drz.lazcdn.com/static/bd/p/13a5f2d7b71e08475f734096feb0889e.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S6c3741f421dd4e618de92426fb167de1s.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/ede05ba07275e05ed6119694a42740c0.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/0686eb8fd572e151d461254f6db13d70.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S36017d121f03456cb9ac3cd0c1e88bb7E.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/47a1bf3d09857547c37de5897e8b38a1.jpg_720x720q80.jpg_.webp',
            'https://ae01.alicdn.com/kf/Sd043fba8a5434d8890b51f501161d893S.jpg',
            'https://img.drz.lazcdn.com/g/kf/Sbd046ce5a27a464da1c70c2d9c061674G.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/8620537cbe7986137a1349de3e9a1ee3.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/b25ded979f8fd3aa226da94a89b5db31.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S8f3834e1a942425ba14ba36149c2bab3b.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/d052e38d8179a885d1198d8939dc49cd.jpg_720x720q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/75f8e0953774ab772ec46048dd307485.jpg_720x720q80.jpg_.webp'

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
                   'image'=>$images[rand(0,12)],
                   'images'=>json_encode($images),
                   'category_id'=>$faker->numberBetween(1,10),


             ]);

        }
    }
}