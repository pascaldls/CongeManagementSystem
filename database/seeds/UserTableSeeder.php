<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user for pascal
        User::create([
            'name' => 'pascal',
            'email' => 'pascal.dls@gmail.com',
            'password' => Hash::make('password')
        ]);
        // php artisan db:seed
        factory(\App\User::class, 10)->create();
    }
}
