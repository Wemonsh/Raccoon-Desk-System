<?php

use Illuminate\Database\Seeder;
use App\RequestsCategory;

class RequestsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestsCategory::create([
            'name' => 'Разное'
        ]);
    }
}
