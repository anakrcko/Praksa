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
        DB::table('users')->insert([
            'name' => 'Aleksandra Radovanovic',
            //'lastName' => 'Radovanovic',
            //'username' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/a.png',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/b.png',
            'userId'=> 2,
        ]);
        DB::table('like')->insert([
            'userPostId' => 1,
            'userLikeId' => 2,
            'postId'=>1,
        ]);
        DB::table('comment')->insert([
            'userPostId' => 1,
            'userCommentId' => 1,
            'postCommentId' => 1,
            'text'=>"Prelepo",
        ]);
    }
}
