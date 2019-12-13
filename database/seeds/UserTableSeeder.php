<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ashwin',
                'company_id' => 1,
                'role_id' => 1,
                'email' => 'ashwin@gmail.com',
                'password' => "password",
                'address1' => 'Test Address 1',
                'address2' => 'Test Address 2',
                'city_id' => 1,
                'zip' => '123123123',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Johan',
                'company_id' => 1,
                'role_id' => 3,
                'email' => 'johan@gmail.com',
                'password' => '123456',
                'address1' => 'John street 1',
                'address2' => 'John street 1',
                'city_id' => 1,
                'zip' => '11123',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
