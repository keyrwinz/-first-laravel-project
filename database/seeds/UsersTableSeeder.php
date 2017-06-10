<?php

use App\Models\User;
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

			User::create(array(
				'id' => 5,
				'name' => 'kenkenn',
				'email' => 'kenz@gmail.com',
				'password' => Hash::make('pass')
			));
    }
}
