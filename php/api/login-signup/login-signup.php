<?php

    require_once("../../db-connect.php");
    class LoginSignup extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

        public  function signUp($post)
        {
            $name = self::$conn->real_escape_string($post['name']);
			$email = self::$conn->real_escape_string($post['email']);
			$mobileno = self::$conn->real_escape_string($post['number']);
			// $country = self::$conn->real_escape_string($post['country']);
            // $city = self::$conn->real_escape_string($post['city']);
            if(array_key_exists('profession', $post)) {
                $profession = self::$conn->real_escape_string($post['profession']);
            }
            $profession = 'Others';
			$password = self::$conn->real_escape_string(md5($post['password']));
			// $is_interest = self::$conn->real_escape_string($post['isInterest']);
			// $email_me = self::$conn->real_escape_string($post['emailMe']);
			$sql = "INSERT INTO users(name,email,mobileno,profession,password) VALUES('$name','$email','$mobileno','$profession','$password')";
			if (self::$conn->query($sql)) {
					session_start();
					$userId = self::$conn->insert_id;
			        $_SESSION['lead_id'] = $post['id'] ? self::$conn->real_escape_string($post['id']) : null;
                    
					$cookie_name = "isLoggedIn";
					$cookie_value = true;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

					$cookie_name = "user_id";
					$cookie_value = $userId;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

					$cookie_name = "email";
					$cookie_value = self::$conn->real_escape_string($post['email']);
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                $post['user_id'] = $userId;
				$resp['status'] = "ok";
				$resp['message'] = "succesfully Inserted";
				$resp['data'] = $post;
				echo json_encode($resp);
			} else {
				$resp['status'] = "no";
				$resp['message'] = self::$conn->error;
				echo json_encode($resp);
			}
        }

    }
