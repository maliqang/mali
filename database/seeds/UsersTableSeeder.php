<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();


        DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => '459157537',
                    'email' => '459157537@qq.com',
                    'password' => bcrypt(123456),
                    'remember_token' => NULL,
                    'created_at' => '2016-12-20 12:49:00',
                    'updated_at' => '2016-12-20 12:49:00',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'marry',
                    'email' => 'marry8512406@qq.com',
                    'password' => bcrypt(123456),
                    'remember_token' => NULL,
                    'created_at' => '2016-12-20 12:49:00',
                    'updated_at' => '2016-12-20 12:49:00',
                )
        ));


    }
}
