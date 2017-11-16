<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'id'=>1,
            'name'=>'user'
        ]);
        \App\Role::create([
            'id'=>2,
            'name'=>'admin'
        ]);
    }
}
