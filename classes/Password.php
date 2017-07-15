<?php

class Password{
	public static function generateHash($string) {
		return hash("sha256", $string);
    }
}