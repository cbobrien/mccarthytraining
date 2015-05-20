<?php

class Application extends Eloquent {
	protected $fillable = array('firstname', 'surname', 'tel', 'email', 'message',
								'qualification', 'matric_path', 'n2_path',
								'id_path', 'cv_path');
}
