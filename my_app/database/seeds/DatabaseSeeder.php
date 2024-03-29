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
            'place' => 'Jagodina, Drazmirovac',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'Kristina lepojevic',
            'place' => 'Jagodina, Majur',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'Novak Djokovic',
            'place' => 'Beograd, Beograd',
            'email' => 'nole@gmail.com',
            'password' => bcrypt('novak'),
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/1.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/2.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/3.jpg',
            'userId'=> 3,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/4.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/5.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/6.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/7.jpg',
            'userId'=> 3,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/8.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/9.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/10.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/11.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/12.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/13.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/14.jpg',
            'userId'=> 3,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/15.jpg',
            'userId'=> 1,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/16.jpg',
            'userId'=> 3,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/19.jpg',
            'userId'=> 2,
        ]);
        DB::table('post')->insert([
            'type' =>'img',
            'filename' => '/home/ana/Desktop/Praksa/Praksa/my_app/public/files/20.jpg',
            'userId'=> 1,
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
