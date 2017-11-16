<?php

use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert(
            [
                'id' => '3',
                'user_id' => null,
                'name'=>'laravelapi app',
                'secret'=>'MbZuMKglyVtxdHFO5VgXJdb7ozqoXxF4rLbQeRHW',
                'redirect'=>'http://localhost',
                'personal_access_client'=>0,
                'password_client'=>1,
                'revoked'=>0
            ]
        );
    }
}
