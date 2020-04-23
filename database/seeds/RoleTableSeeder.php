<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Rol;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Rol::query()->truncate();

        DB::table('roles')->insert([
            'name' => 'ADMIN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'USER',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
