<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'jeffrey lim',
            'email'=>'jlportfolio28858@gmail.com',
            'password'=>'$2y$10$Tl95nas3hL9e5X82qJ0WpuznIBjln70pBdOdiRm4hcEyiVKbTmbXC'
        ]);

        \App\User::create([
            'name'=>'michelle lim',
            'email'=>'user@user.com',
            'password'=>'$2y$10$Tl95nas3hL9e5X82qJ0WpuznIBjln70pBdOdiRm4hcEyiVKbTmbXC'
        ]);
    }
}
