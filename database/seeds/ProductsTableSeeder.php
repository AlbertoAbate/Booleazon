<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Http\File;
use App\Product;
use Illuminate\Support\Facades\Storage;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Product::truncate();

        //popoliamo il db
        for ($i=0; $i < 10 ; $i++) { 
            $newProduct = new Product();

            $newProduct->name = $faker->text(80);
            $newProduct->productor = $faker->username();
            $newProduct->description = $faker->text(255);
            $newProduct->price = $faker->randomNumber(6);
            // $newProduct->image = $faker->url();
            $image = $faker->image(null, 640, 480);
            $imageFile = new File($image);
            $newProduct->image = Storage::disk('public')->putFile('images', $imageFile);

            //salvataggio
            $newProduct->save();
        }
    }
}
