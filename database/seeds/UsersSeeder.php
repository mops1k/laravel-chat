<?php
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: mops1k
 * Date: 06.11.2015
 * Time: 23:47
 */
class UsersSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'mops1k',
            'email' => 'bednyj.mops@gmail.com',
            'password' => bcrypt('ma5Haash'),
        ]);
    }
}