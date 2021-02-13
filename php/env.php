<?php
    function getEnvVar() {
        // Local Database 
        $myEnv = [];
        $myEnv['server'] = "localhost";
		$myEnv['user'] = "root";
		$myEnv['password'] = "";
		$myEnv['database'] = "Archue";

		// Demo Database 
		// self::$user = "u917779307_user";
		// self::$database = "u917779307_arch";
		// self::$password = "nohL0vm2amYH";1

		// Main Database 
		//  self::$user = "u917779307_user";
		//  self::$database = "u917779307_arch";
        //  self::$password = "nohL0vm2amYH";
        return $myEnv;
    }
?>