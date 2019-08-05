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
            'name' => 'Ana Radovanovic',
            //'lastName' => 'Radovanovic',
            //'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/img/a.png',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/img/b.png',
            'userId'=> 1,
        ]);
    }
}
