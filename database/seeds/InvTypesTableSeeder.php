<?php

use Illuminate\Database\Seeder;
use App\InvTypes;

class InvTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvTypes::create([
            'name' => 'PC',
            'description' => 'Personal Computer',
            'properties' => json_encode(['cpu','motherboard','gpu','memory','storage','power_supply','optical_drive'])
        ]);

        InvTypes::create([
            'name' => 'NoteBook',
            'description' => 'NoteBook Computer',
            'properties' => json_encode(['cpu','gpu','memory','storage','optical_drive', 'screen_diagonal'])
        ]);

        InvTypes::create([
            'name' => 'MFD',
            'description' => 'Multi Functional Device',
            'properties' => json_encode(['color','print_tech','format','speed','resolution', 'interfaces'])
        ]);
    }
}
