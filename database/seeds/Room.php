<?php

use Illuminate\Database\Seeder;

class Room extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->delete();

        DB::table('rooms')->insert([
            'name' => 'Test room',
            'description' => 'Testing chat room for developer'
        ]);
    }
}
