<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USER
        DB::table('users')->insert([
            'nimnip' => '1234567890123456',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('adminadmin'),
            'created_at' =>'2021-04-26 07:00:00',
            'updated_at' => '2021-04-26 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '1234567890122341',
            'username' => 'pembimbing',
            'email' => 'pembimbing@gmail.com',
            'role' => 2,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('pembimbing'),
            'created_at' =>'2023-10-05 07:16:48',
            'updated_at' => '2023-10-05 07:16:48',
        ]);
        DB::table('users')->insert([
            'nimnip' => 'PO1287346273',
            'username' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'role' => 3,
            'avatar' => 'AvatarDefault.jpg',
            'pembimbing'=>'1234567890122341',
            'password' => bcrypt('mahasiswa'),
            'created_at' =>'2022-09-11 07:00:00',
            'updated_at' => '2022-09-11 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '8732982364754645',
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'role' => 1,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user1user1'),
            'created_at' =>'2022-11-25 07:00:00',
            'updated_at' => '2022-11-25 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '0926374816237653',
            'username' => 'user2',
            'email' => 'user2@gmail.com',
            'role' => 2,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user2user2'),
            'created_at' =>'2023-07-08 07:16:48',
            'updated_at' => '2023-07-08 07:16:48',
        ]);
        DB::table('users')->insert([
            'nimnip' => 'PO0972635135',
            'username' => 'user3',
            'email' => 'user3@gmail.com',
            'role' => 3,
            'avatar' => 'AvatarDefault.jpg',
            'pembimbing'=>'0926374816237653',
            'password' => bcrypt('user3user3'),
            'created_at' =>'2021-03-06 07:00:00',
            'updated_at' => '2021-03-06 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '0926374819237645',
            'username' => 'user4',
            'email' => 'user4@gmail.com',
            'role' => 1,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user4user4'),
            'created_at' =>'2021-05-16 07:00:00',
            'updated_at' => '2021-05-16 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '1234567890127634',
            'username' => 'user5',
            'email' => 'user5@gmail.com',
            'role' => 2,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user5user5'),
            'created_at' =>'2023-02-10 07:16:48',
            'updated_at' => '2023-02-10 07:16:48',
        ]);
        DB::table('users')->insert([
            'nimnip' => 'PO1293847609',
            'username' => 'user6',
            'email' => 'user6@gmail.com',
            'role' => 3,
            'avatar' => 'AvatarDefault.jpg',
            'pembimbing'=>'1234567890127634',
            'password' => bcrypt('user6user6'),
            'created_at' =>'2022-08-19 07:00:00',
            'updated_at' => '2022-08-19 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '8732982364750987',
            'username' => 'user7',
            'email' => 'user7@gmail.com',
            'role' => 1,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user7user7'),
            'created_at' =>'2022-12-20 07:00:00',
            'updated_at' => '2022-12-20 07:00:00'
        ]);
        DB::table('users')->insert([
            'nimnip' => '0926374816232387',
            'username' => 'user8',
            'email' => 'user8@gmail.com',
            'role' => 2,
            'avatar' => 'AvatarDefault.jpg',
            'password' => bcrypt('user8user8'),
            'created_at' =>'2023-06-13 07:16:48',
            'updated_at' => '2023-06-13 07:16:48'
        ]);
        DB::table('users')->insert([
            'nimnip' => 'PO0927364518',
            'username' => 'user9',
            'email' => 'user9@gmail.com',
            'role' => 3,
            'avatar' => 'AvatarDefault.jpg',
            'pembimbing'=>'0926374816232387',
            'password' => bcrypt('user9user9'),
            'created_at' =>'2021-01-12 07:00:00',
            'updated_at' => '2021-01-12 07:00:00'
        ]);


        
    }
}
