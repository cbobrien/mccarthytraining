<?php
 
class CopySeeder extends DatabaseSeeder {

	public function run() {
		$pages = [
			[
				"name" => "home",
				"content" => "The Bidvest Automotive Training Academy has operations situated in Johannesburg, Pinetown and Cape Town, are all MerSETA accredited for offering diesel mechanic apprenticeship programs, as well as basic electrical courses and car mechanic courses. We offer training and testing on Motor, Diesel and Autotronics, and our fully trained and experienced trainers aim to develop and qualify our learners into internationally recognized professionals. We take great pride in our programmes and have been at the forefront in designing and developing these to ensure our learners are at the pinnacle of their levels – whether they choose electrical training in South Africa or diesel mechanic training in South Africa."
			],
			[
				"name" => "apply-intro",
				"content" => "Apply intro. Mauris augue augue, varius quis metus et, bibendum accumsan mi. Curabitur fermentum justo neque, et placerat risus varius in."
			],
			[
				"name" => "apply-thank-you",
				"content" => "Your application has been successfully uploaded. The academy will contact you within 10 working days."
			],
			[
				"name" => "courses",
				"content" => '<h2>
								Bidvest Automotive Careers<br>
								Motor Mechanic and Technicians Jobs
							  </h2>
							  <p>
							   Please click through the below headings to see how your career could grow.
							  </p>'
			],
			[
				"name" => "careers",
				"content" => "Courses. Placerat risus varius in."
			],
			[
				"name" => "careers-image",
				"content" => ""
			],
			[
				"name" => "contact",
				"content" => '<h4>Do You Have Questions?</h4>
							<p>
								Should you have a few queries regarding any of our quality courses, please complete the form below, and we will get back to you.
							</p>							
							<h3>Quick Contact Form:</h3>'
			]
		];

		foreach ($pages as $page) {
			Copy::create($page);
		}
	}
}