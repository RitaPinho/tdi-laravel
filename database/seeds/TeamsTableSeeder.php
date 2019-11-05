<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Team::create([
            'name' => 'Benfica',
            'country' => 'Portugal',
            'division' => '1'
        ]);

        \App\Team::create([
            'name' => 'Paços de Ferreira',
            'country' => 'Portugal',
            'division' => '1'
        ]);
    }
}
