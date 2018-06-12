<?php
	require_once("db-connect.php");
	class App extends Conn{
		private static $conn;
		public static function setConnect(){
			self::$conn = self::connect();
		} 
		public static function signUp($post){
			$name = self::$conn->real_escape_string($post['name']);
			$email = self::$conn->real_escape_string($post['email']);
			$mobileno = self::$conn->real_escape_string($post['mobileno']);
			$country = self::$conn->real_escape_string($post['country']);
			$city = self::$conn->real_escape_string($post['city']);
			$profession = self::$conn->real_escape_string($post['profession']);
			$password = self::$conn->real_escape_string($post['password']);
			$is_interest = self::$conn->real_escape_string($post['isInterest']);
			$email_me = self::$conn->real_escape_string($post['emailMe']);
			$sql = "INSERT INTO users(name,email,mobileno,country,city,profession,password,is_interest,email_me) VALUES('$name','$email','$mobileno','$country','$city','$profession','$password','$is_interest','$email_me')";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
				$resp['message'] = "succesfully Inserted";
				echo json_encode($resp);
			}
			else{
				$resp['status'] = "ok";
				$resp['message'] = self::$conn->error;
				echo json_encode($resp);
			}
		}
		public static function login($post){
			$email = $post['email'];
			$password = $post['password'];
			$remember = $post['remember'];
			$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			if($result = self::$conn->query($sql)){
				if($result->num_rows>0){
					// echo gettype($remember);
					session_start();
					$row = $result->fetch_assoc();
					if($remember=="true"){
						$resp['status'] = "remember";
						$resp['data'] = $row;
						$cookie_name = 'username';
						$cookie_value = $row['name'];
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
						echo json_encode($resp);
					}
					else{
						// echo json_encode("user do not want to remember");
						$resp['data'] = $row;
						$resp['status'] = "yes";
						$_SESSION['username'] = $row['name'];
						$_SESSION['id'] = $row['user_id'];
						echo json_encode($resp);
					}
				}
				else{
					$resp['data'] = "No rows";
					$resp['status'] = "no";
					echo json_encode($resp);
				}
			}
			else{
				$resp['data'] = "Query Error";
				$resp['status'] = "no";
				echo json_encode($resp);
			}
		}
		
	}
	App::setConnect();
?>