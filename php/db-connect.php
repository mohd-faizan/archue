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

		// Local Database 
		self::$user = "root";
		self::$database = "archue";
		self::$password = "";
		

		
		$conn = new mysqli(self::$server, self::$user, self::$password, self::$database);
		if ($conn->connect_error) {
			exit;
		} else {
			$conn->set_charset("utf8");
			return $conn;
		}
	}
}
