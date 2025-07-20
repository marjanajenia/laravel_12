<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('12345678')],
            ['id' => 2, 'name' => 'user',  'email' => 'user@user.com', 'password' => Hash::make('12345678')],
        ]);
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'user', 'guard_name' => 'web'],
        ]);
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'web_insert', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'web_view', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'web_update', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'web_delete', 'guard_name' => 'web'],
        ]);
        DB::table('role_has_permissions')->insert([
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 1, 'role_id' => 2],
            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 2],
            ['permission_id' => 4, 'role_id' => 2],
        ]);
        DB::table('model_has_roles')->insert([
            ['role_id' => 1, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['role_id' => 2, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['role_id' => 2, 'model_id' => 2, 'model_type' => 'App\Models\User'],
        ]);
        DB::table('model_has_permissions')->insert([
            ['permission_id' => 1, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['permission_id' => 2, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['permission_id' => 3, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['permission_id' => 4, 'model_id' => 1, 'model_type' => 'App\Models\User'],
            ['permission_id' => 1, 'model_id' => 2, 'model_type' => 'App\Models\User'],
            ['permission_id' => 2, 'model_id' => 2, 'model_type' => 'App\Models\User'],
            ['permission_id' => 3, 'model_id' => 2, 'model_type' => 'App\Models\User'],
            ['permission_id' => 4, 'model_id' => 2, 'model_type' => 'App\Models\User'],
        ]);
    }
}
