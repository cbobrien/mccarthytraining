<?php

class Enquiry extends Eloquent {
	protected $fillable = array('firstname', 'surname', 'tel', 'email', 'questions');	
}
