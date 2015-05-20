<?php
 
class UserSeeder extends DatabaseSeeder {

	public function run() {
		$users = [
			[
				"username" => "admin",
				"password" => Hash::make("cbr123"),
				"email"    => "connoro@cbrmarketing.co.za"
			]
		];

		foreach ($users as $user) {
			User::create($user);
		}
	}
}