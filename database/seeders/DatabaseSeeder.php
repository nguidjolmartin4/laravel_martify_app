<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Nguidjol',
                'last_name' => 'Martin',
                'email' => 'nguidjol.martin@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Nkayou',
                'last_name' => 'Frank',
                'email' => 'nkayou.frank@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Egbe',
                'last_name' => 'Ngu',
                'email' => 'egbe.ngu@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Joram',
                'last_name' => 'Kontchou',
                'email' => 'joram.kontchou@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Ngatga',
                'last_name' => 'Ted',
                'email' => 'ngatga.ted@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Bessala',
                'last_name' => 'Frank',
                'email' => 'bessala.frank@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Batind',
                'last_name' => 'Alain',
                'email' => 'batind.alain@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Jesus',
                'last_name' => 'Christ',
                'email' => 'jesus.chris@gmail.com',
                'password' => '123123123',
            ],
            [
                'first_name' => 'Raoul',
                'last_name' => 'Wafo',
                'email' => 'raoul.wafo@gmail.com',
                'password' => '123123123',
            ],
        ];

        $now = Carbon::now();

        foreach ($users as $user) {
            DB::table('users')->insert([
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
