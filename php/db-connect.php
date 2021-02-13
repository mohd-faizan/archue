<?php
class Conn
{
	private static $server;
	private static $user;
	private  static $password;
	private static $database;
	public static function connect()
	{
		self::$server = "localhost";

		Local Database 
		self::$user = "root";
		self::$database = "archue";
		self::$password = "";
		// Demo Database 
		// self::$user = "u917779307_user";
		// self::$database = "u917779307_arch";
		// self::$password = "nohL0vm2amYH";1

		// Main Database 
		//  self::$user = "archue1_archue";
		//  self::$database = "archue1_archue";
        //  self::$password = "Archue@12345";

		$conn = new mysqli(self::$server, self::$user, self::$password, self::$database);
		if ($conn->connect_error) {
			exit;
		} else {
			$conn->set_charset("utf8");
			return $conn;
		}
	}
}
