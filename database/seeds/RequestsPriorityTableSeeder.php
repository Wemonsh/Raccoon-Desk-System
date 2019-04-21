<?php

use Illuminate\Database\Seeder;
use App\RequestsPriority;

class RequestsPriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestsPriority::create([
            'name' => 'Низкий'
        ]);

        RequestsPriority::create([
            'name' => 'Обычный'
        ]);

        RequestsPriority::create([
            'name' => 'Высокий'
        ]);
    }
}
