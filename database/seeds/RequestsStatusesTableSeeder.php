<?php

use Illuminate\Database\Seeder;
use App\RequestsStatuses;

class RequestsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestsStatuses::create([
            'name' => 'Открыта'
        ]);

        RequestsStatuses::create([
            'name' => 'В работе'
        ]);

        RequestsStatuses::create([
            'name' => 'Заморожена'
        ]);

        RequestsStatuses::create([
            'name' => 'Закрыта'
        ]);
    }
}
