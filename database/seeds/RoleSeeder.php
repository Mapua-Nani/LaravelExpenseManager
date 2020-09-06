<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => 1, 'title' => 'Administrator', 'description' =>'Super User',]);
        Role::create(['id' => 2, 'title' => 'Simple user', 'description' =>'can add expenses',]);
    }
}
