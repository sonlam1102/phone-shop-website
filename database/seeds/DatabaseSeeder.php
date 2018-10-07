<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'type' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@root.com',
            'password' => bcrypt('123456'),
            'type' => 0,
        ]);
    }
}
