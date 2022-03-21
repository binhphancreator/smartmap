<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore(['id' => 1, 'email' => 'admin@smartmap.com', 'name' => 'adminsmartmap', 'password' => bcrypt('smartmap')]);
    }
}
