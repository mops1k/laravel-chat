<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->command->info('User table seeded!');
        $this->call(Room::class);
        $this->command->info('Room table seeded!');
        $this->call(RoleAndPermissionSeeder::class);
        $this->command->info('Role and permission seeded!');

        Model::reguard();
    }
}
