<?php
 
class SlideSeeder extends DatabaseSeeder {

	public function run() {
		$slides = [
			[
				"title" => "Test slide title one",
				"content" => "Sed nec risus sed risus ornare vestibulum. Morbi dolor enim, posuere id mauris eu, maximus scelerisque augue.",
				"image"    => "slide1.jpg"
			]
		];

		foreach ($slides as $slide) {
			Slide::create($slide);
		}
	}
}