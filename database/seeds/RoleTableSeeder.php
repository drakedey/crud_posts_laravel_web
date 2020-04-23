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

        Rol::query()->truncate();

        DB::table('role')->insert([
            'name' => 'ADMIN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role')->insert([
            'name' => 'USER',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
