<?php

use App\City;
use App\Load;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LoadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $filepath = storage_path('app/public/images');
        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }
        for ($i = 1; $i < 11; $i++) {
            Load::create([
                'city_from_id' => City::all()->random()->id,
                'city_to_id' => City::all()->random()->id,
                'name' => '',
                'volume' => $faker->randomNumber(2),
                'photo' => $faker->image($filepath, 200, 100, null, false)
            ])
            ->setTranslations('name', ['en' => "Load $i", 'uk' => "Вантаж $i" ])->save();
        }
    }
}
