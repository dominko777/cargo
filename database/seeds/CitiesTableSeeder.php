<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['lat' => 50.431782, 'lng' => 30.516382, 'name' => '', 'slug' => 'kyiv'])
            ->setTranslations('name', ['en' => 'Kyiv', 'uk' => 'Київ' ])->save();
        City::create(['lat' => 49.23278, 'lng' => 28.48097, 'name' => '', 'slug' => 'vinnytsa'])
            ->setTranslations('name', ['en' => 'Vinnytsa', 'uk' => 'Вінниця' ])->save();
        City::create(['lat' => 49.842957, 'lng' => 24.031111, 'name' => '', 'slug' => 'lviv'])
            ->setTranslations('name', ['en' => 'Lviv', 'uk' => 'Львів' ])->save();
    }
}
