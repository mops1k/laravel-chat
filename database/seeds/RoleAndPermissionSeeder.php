<?php

use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('permission_role')->delete();
        DB::table('role_user')->delete();

        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Администратор',
            'description' => 'Может управлять системой без каких либо ограничений'
        ]);

        DB::table('permissions')->insert([
            'name' => 'user.ban',
            'display_name' => 'Бан пользователя',
            'description' => 'Закрыть пользователю доступ'
        ]);
    }
}
