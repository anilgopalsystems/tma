<?php

class UserTableSeeder extends Seeder {


	public function run()
	{
		$user = new User;
		$user->org_id = 1;
		$user->email = 'anilkumara@gopalsystems.com';
		$user->password = Hash::make('abcd');
		$user->save();
	}

}