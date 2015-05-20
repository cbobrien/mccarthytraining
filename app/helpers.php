<?php

function cleanInput($input) {
	return preg_replace('@[\'"/\\<>;\r\n- ]@', '', $input);
}