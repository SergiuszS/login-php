<?php

class Password{
	public static function generateHash($string) {
		return password_hash($string, PASSWORD_DEFAULT);
    }
		public static function verifyHash($password, $hash){
			return password_verify($password, $hash);
		}
}