<?php

use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('AdminUserModel')->create([
            'username' => 'benzun',
            'password' => bcrypt('benzun'),
        ]);
    }
}
