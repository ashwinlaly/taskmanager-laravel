<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProjectUserTableSeeder::class);
    }
}
