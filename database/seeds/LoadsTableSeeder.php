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
        factory(Load::class, 10)->create();
    }
}
