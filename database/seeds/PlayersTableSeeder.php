<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Player::create([
            'name' => 'RDT',
            'age' => '24',
            'position' => 'Striker',
            'team_id' => 1,
        ]);

        \App\Player::create([
            'name' => 'Pedrinho',
            'age' => '26',
            'position' => 'Midfielder',
            'team_id' => 2,
        ]);

    }
}
