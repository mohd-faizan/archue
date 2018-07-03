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
						$resp['status'] = "yes";
						$resp['data'] = $row;
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
		public static function updateUser($file,$post){
			$name = $post['name'];
			$profession = $post['profession'];
			$id = $post['id'];
			$location = "../uploads/";
			$filename = str_replace(" ", "_", $file['name']);
			if(move_uploaded_file($file['tmp_name'], $location."".$filename)){
				$sql = "UPDATE users SET name='$name',profession='$profession',profile='$filename' WHERE user_id=$id";
				if(self::$conn->query($sql)){
					$resp['status'] = "ok";
					$resp['message'] = "updtaed";
				}else{
					$resp['status'] = "no";
					$resp['message'] = self::$conn->error;
				}
				echo json_encode($resp);
			}
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
		public static function uploadMaterial($post){
			$product_name = $post['product_name'];
			$area = $post['area'];
			$budget = $post['budget'];
			$specification = $post['specification'];
			$email = $post['email'];
			$phone = $post['phone'];
			$locat = $post['locat'];
			$requirement = $post['requirement'];
			$mydate = $post['mat_date'];
			//echo json_encode($post);
			$sql = "INSERT INTO material(product_name,area,budget,specification,email,phone,locat,requirement,mat_date) VALUES('$product_name','$area','$budget','$specification','$email','$phone','$locat','$requirement','$mydate') ";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
			}
			else{
				$resp['status'] = "no";
			}
			echo json_encode($resp);
		}
		public static function uploadArchitect($post){
			$service = $post['service'];
			$project_type = $post['project_type'];
			$area = $post['area'];
			$budget = $post['budget'];
			$specification = $post['specification'];
			$email = $post['email'];
			$phone = $post['phone'];
			$locat = $post['locat'];
			$requirement = $post['requirement'];
			$mydate = $post['arc_date'];
			//echo json_encode($post);
			$sql = "INSERT INTO architect(service,project_type,area,budget,specification,email,phone,locat,requirement,arc_date) VALUES('$service','$project_type','$area','$budget','$specification','$email','$phone','$locat','$requirement','$mydate') ";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
			}
			else{
				$resp['status'] = "no";
			}
			echo json_encode($resp);
		}
		public static function forgotPassword($post){
			$email = $_POST['email'];
			$sql = "SELECT password FROM users WHERE email='$email'";
			if($res=self::$conn->query($sql)){
				if($res->num_rows>0){
					$row = $res->fetch_assoc();
					$resp = self::mailTo($email,$row['password']);
					$resp['status'] = "ok";
				} 
				else{
					$resp['data'] = "No Data";
					$resp['status'] = "no";
				}
				echo json_encode($resp);
			}
		}
		public static function contacts($post){
			echo json_encode(self::contactMailTo($post));
		}
		public static function contactMailTo($post){
			$name = $post['name'];
			$email = $post['email'];
			$query = $post['query'];
			$to = "submissions@archue.com";
			$subject = "User contact throught website";
			$msg = "
					<html>
						<body>
							<table>
								<tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>query</th>
								</tr>
								<tr>
								  <td>$name</td>
								  <td>$email</td>
								  <td>$query</td>
								</tr>
							</table>
						</body>
					</html>
			       ";
			$headers = "MIME-Version:1.0".PHP_EOL;
			$headers .= "Content-Type:text/html;charset=UTF-8";
			return mail($to,$subject,$msg,$headers);
		}
		public static function mailTo($email,$pass){
			$to = $email;
			$subject = "Password Reset Request ";
			$message = "Your Password is <b>$pass</b>";
			$headers = "MIME-Version:1.0".PHP_EOL;
			$headers .= "Content-Type:text/html;charset=UTF-8".PHP_EOL;
			$headers .= "From:archue@gmail.com";
			return mail($to,$subject,$message,$headers);
		}
		public static function searchQuery($post){
			$query = $post['query'];
			$type = $post['type'];
			switch($type){
				case "projects":
					 $sql = "SELECT * FROM projects WHERE project_name LIKE '%$query' OR project_name LIKE '$query%' OR project_name LIKE '%$query%'";
					$proResp = self::excuteQuery($sql);
					$proResp['type'] = "project";
					echo json_encode($proResp);
				break;
				case "thesis":
					$sql = "SELECT * FROM thesis WHERE thesis_name LIKE '%$query' OR thesis_name LIKE '$query%' OR thesis_name LIKE '%$query%'";
					$thesisResp = self::excuteQuery($sql);
					$thesisResp['type'] = "thesis";
					echo json_encode($thesisResp);
				break;
				case "events":
					$sql = "SELECT * FROM events WHERE event_name LIKE '%$query' OR event_name LIKE '$query%' OR event_name LIKE '%$query%'";
					$thesisResp = self::excuteQuery($sql);
					$thesisResp['type'] = "events";
					echo json_encode($thesisResp);
				break;
				case "competition":
					$sql = "SELECT * FROM competition WHERE competition_heading LIKE '%$query' OR competition_heading LIKE '$query%' OR competition_heading LIKE '%$query%'";
					$thesisResp = self::excuteQuery($sql);
					$thesisResp['type'] = "competition";
					echo json_encode($thesisResp);
				break;
				case "jobs":
					$sql = "SELECT * FROM jobs WHERE job_heading LIKE '%$query' OR job_heading LIKE '$query%' OR job_heading LIKE '%$query%'";
					$thesisResp = self::excuteQuery($sql);
					$thesisResp['type'] = "jobs";
					echo json_encode($thesisResp);
				break;
			}
		}
		public static function excuteQuery($sql){
			$arr = array();
			if($res=self::$conn->query($sql)){
				if($res->num_rows>0){
					while($row=$res->fetch_assoc()){
						array_push($arr, $row);
					}
					$resp['data'] = $arr;
					$resp['status'] = 1;
				}
				else{
					$resp['data'] = [];
					$resp['status'] = 2;
				}
			}
			else{
				$resp['data'] = self::$conn->error;
				$resp['status'] = 3;
			}
			return $resp;
		}
	}
	App::setConnect();
?>

