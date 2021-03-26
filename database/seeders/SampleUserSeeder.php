<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class SampleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'jamshid888',
            'email' => 'jamshid.kiani@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);

        DB::table('user_role')->insert([
            'user_id' => DB::table('users')
                ->where('email','jamshid.kiani@gmail.com')->first()->id,
            'role_id' => DB::table('roles')
                ->where('name','customer')->first()->id
        ]);
    }
}
