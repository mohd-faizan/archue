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
			$sql = "SELECT user_id,name,profession,company_name,profile FROM users WHERE email='$email' AND password='$password'";
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
				$resp['data'] = self::$conn->error;
				$resp['status'] = "no";
				echo json_encode($resp);
			}
		}
		public static function fetchUserData($post){
			$id = $post['id'];
			$sql1 = "SELECT * FROM blog WHERE user_id= $id ORDER BY blog_id DESC";
			$resp['blogs'] = self::run($sql1);
			$sql2 = "SELECT * FROM dessertation WHERE user_id = $id ORDER BY dessertation_id DESC";
			$resp['dessertation'] = self::run($sql2);
			$sql3 = "SELECT * FROM portfolio WHERE user_id=$id ORDER BY portfolio_id DESC";
			$resp['portfoli'] = self::run($sql3);
			$sql4 = "SELECT * FROM projects WHERE user_id=$id ORDER BY project_id DESC";
			$resp['projects'] = self::run($sql4);
			$sql5 = "SELECT * FROM thesis WHERE user_id=$id ORDER BY thesis_id DESC";
			$resp['thesis'] = self::run($sql5);
			$sql6 = "SELECT * FROM thesis_report WHERE user_id=$id ORDER BY thesis_report_id DESC";
			$resp['thesis_report'] = self::run($sql6);
			echo json_encode($resp);
			
		}
		public static function run($sql){
			$arr = array();
			if($res=self::$conn->query($sql)){
				while($row=$res->fetch_assoc()){
					array_push($arr, $row);
				}
				return $arr;
			}
		}
	}
	App::setConnect();
?>