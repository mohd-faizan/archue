	<?php
	require_once("db-connect.php");

	class App extends Conn
	{
		private static $conn;
		public static function setConnect()
		{
			self::$conn = self::connect();
		}
		public static function checkEmailExistence($post)
		{
			$email = self::$conn->real_escape_string($post['email']);
			$sql = "SELECT email FROM users WHERE email = '$email'";
			if ($res = self::$conn->query($sql)) {
				if ($res->num_rows > 0) {
					$resp['data'] = true;
				} else {
					$resp['data'] = false;
				}
			} else {
				$resp['data'] = false;
			}
			echo json_encode($resp);
		}
		public static function signUp($post)
		{
			$name = self::$conn->real_escape_string($post['name']);
			$email = self::$conn->real_escape_string($post['email']);
			$mobileno = self::$conn->real_escape_string($post['mobileno']);
			// $country = self::$conn->real_escape_string($post['country']);
			// $city = self::$conn->real_escape_string($post['city']);
			$profession = self::$conn->real_escape_string($post['profession']);
			$password = self::$conn->real_escape_string(md5($post['password']));
			$is_interest = self::$conn->real_escape_string($post['isInterest']);
			$email_me = self::$conn->real_escape_string($post['emailMe']);
			// $uid = UUID();
			$sql = "INSERT INTO users(name,email,mobileno,profession,password,is_interest,email_me, username) VALUES('$name','$email','$mobileno','$profession','$password','$is_interest','$email_me', UUID())";
			if (self::$conn->query($sql)) {
				$resp['status'] = "ok";
				$resp['message'] = "succesfully Inserted";
				$id = self::$conn->insert_id;
				$sql = "SELECT * FROM users WHERE user_id = $id";
				if ($res = self::$conn->query($sql)) {
					if ($res->num_rows > 0) {
						$row = $res->fetch_assoc();
						$resp['data'] = $row;
					} else {
						$resp['data'] = 'No Data';
					}
				} else {
					$resp['data'] = 'Query error';
				}
				// $resp['data'] = array('user_id' => self::$conn->insert_id, 'username' => $uid);
				echo json_encode($resp);
			} else {
				$resp['status'] = "ok";
				$resp['message'] = self::$conn->error;
				echo json_encode($resp);
			}
		}
		public static function login($post)
		{
			$email = $post['email'];
			$password = md5($post['password']);
			$remember = $post['remember'];
			$sql = "SELECT user_id,name,profession,company_name,username,profile,email FROM users WHERE email='$email' AND password='$password'";
			if ($result = self::$conn->query($sql)) {
				if ($result->num_rows > 0) {					
					$cookie_name = "isLoggedIn";
					$cookie_value = true;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
					
					$row = $result->fetch_assoc();
					$_SESSION['user_id'] = $row['user_id'];

					$cookie_name = "user_id";
					$cookie_value = $row['user_id'];
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
					$_COOKIE['user_id'] = $row['user_id'];
					$cookie_name = "email";
					$cookie_value = $row['email'];
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

					if ($remember == "true") {
						$resp['status'] = "remember";
						$resp['data'] = $row;
						
						$cookie_name = 'username';
						$cookie_value = $row['name'];
						setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						echo json_encode($resp);
					} else {
						$resp['status'] = "remember";
						$resp['data'] = $row;
						$_SESSION['username'] = $row['name'];
						$_SESSION['id'] = $row['user_id'];
						echo json_encode($resp);
					}
				} else {
					$resp['data'] = "No rows";
					$resp['status'] = "no";
					echo json_encode($resp);
				}
			} else {
				$resp['data'] = self::$conn->error;
				$resp['status'] = "no";
				echo json_encode($resp);
			}
		}
		public static function fetchUserData($post)
		{
			$id = $post['id'];
			$sql1 = "SELECT * FROM blog WHERE user_id= $id ORDER BY blog_id DESC";
			$resp['blogs'] = self::run($sql1);
			$sql2 = "SELECT * FROM dessertation WHERE user_id = $id ORDER BY dessertation_id DESC";
			$resp['dessertations'] = self::run($sql2);
			$sql3 = "SELECT * FROM portfolio WHERE user_id=$id ORDER BY portfolio_id DESC";
			$resp['portfolios'] = self::run($sql3);
			$sql4 = "SELECT * FROM projects WHERE user_id=$id ORDER BY project_id DESC";
			$resp['projects'] = self::run($sql4);
			$sql5 = "SELECT * FROM thesis WHERE user_id=$id ORDER BY thesis_id DESC";
			$resp['thesises'] = self::run($sql5);
			$sql6 = "SELECT * FROM thesis_report WHERE user_id=$id ORDER BY thesis_report_id DESC";
			$resp['thesis_reports'] = self::run($sql6);
			$sql7 = "SELECT * FROM payment WHERE user_id=$id";
			$ids = self::run($sql7);
			$leadArr = array();
			foreach($ids as $id) {
				// print_r ($id);
				$lead_id = $id['lead_id'];
				$sql8 = "SELECT * from leads WHERE lead_id = $lead_id";
				// print_r(self::run($sql8));
				$resp1 = self::run($sql8)[0];
				$resp1['purchased_on'] = $id['purchased_on'];
				array_push($leadArr, $resp1);
			}
			$resp['payLeads'] = $leadArr;
			echo json_encode($resp);
		}
		public static function updateFullProfile($post) {
			// var_dump($post);
			$name = $post['name'];
			$profession = $post['profession'];
			$about_me = $post['about_me'];
			$email = $post['email'];
			$mobileno = $post['mobileno'];
			$user_id = $post['user_id'];
			$username = $post['username'];

			$company_name = $post['company_name'];
			$dob = $post['dob'];
			$country = $post['country'];
			$website = $post['website'];
			$sql = "UPDATE users SET name='$name',profession='$profession', about_me='$about_me', email='$email', mobileno='$mobileno', username='$username', company_name='$company_name', dob='$dob', country='$country', website='$website' WHERE user_id=$user_id";
				if (self::$conn->query($sql)) {
					$resp['status'] = "ok";
					$sql2 = "SELECT * FROM users WHERE user_id=$user_id";
					$res = self::$conn->query($sql2);
					$row = $res->fetch_assoc();
					$resp['message'] = $row;
				} else {
					$resp['status'] = "no";
					$resp['message'] = self::$conn->error;
				}
				echo json_encode($resp);
			// echo json_encode($post);
		}
		public static function validateUsername($username) {
			$sql = "SELECT * FROM users WHERE username='$username'";
				if ($res = self::$conn->query($sql)) {
					if($res->num_rows > 0) {
						$resp['unique'] = false;
					} else {
						$resp['unique'] = true;
					}
				} else {
					$resp['unique'] = false;
				}
				echo json_encode($resp);
		}
		public static function updateUser($file, $post)
		{
			$name = $post['name'];
			$profession = $post['profession'];
			$id = $post['id'];
			$location = "../uploads/";
			$filename = str_replace(" ", "_", $file['name']);
			if (move_uploaded_file($file['tmp_name'], $location . "" . $filename)) {
				$sql = "UPDATE users SET name='$name',profession='$profession',profile='$filename' WHERE user_id=$id";
				if (self::$conn->query($sql)) {
					$resp['status'] = "ok";
					$sql2 = "SELECT user_id,name,profession,company_name,profile FROM users WHERE user_id=$id";
					$res = self::$conn->query($sql2);
					$row = $res->fetch_assoc();
					$resp['message'] = $row;
				} else {
					$resp['status'] = "no";
					$resp['message'] = self::$conn->error;
				}
				echo json_encode($resp);
			}
		}
		public static  function deleteHim($post)
		{
			$id = $post['id'];
			$tables = array("project_upload_feedback", "thesis", "thesis_report", "blog", "dessertation", "material_upload", "plan_info", "portfolio", "projects", "users");
			foreach ($tables as $table) {
				$sql = "DELETE FROM $table WHERE user_id=$id";
				if (self::$conn->query($sql)) {
					$resp['status'] = true;
				} else {
					$resp['status'] = false;
				}
			}
			echo json_encode($resp);
		}
		public static function delete($post)
		{
			$id = $post['id'];
			$tableName = $post['tableName'];
			$key = $tableName . "_id";
			if ($tableName == "projects") {
				$key = "project_id";
			}
			$sql = "DELETE FROM $tableName WHERE $key = $id";
			if (self::$conn->query($sql)) {
				$resp['status'] = true;
				$resp['data'] = "Succesfully deleted";
			} else {
				$resp['status'] = false;
				$resp['data'] = self::$conn->error;
			}
			echo json_encode($resp);
		}
		public static function run($sql)
		{
			$arr = array();
			if ($res = self::$conn->query($sql)) {
				while ($row = $res->fetch_assoc()) {
					array_push($arr, $row);
				}
				return $arr;
			}
		}
		public static function uploadMaterial($post)
		{
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
			if (self::$conn->query($sql)) {
				$resp['status'] = "ok";
			} else {
				$resp['status'] = "no";
			}
			echo json_encode($resp);
		}
		public static function uploadArchitect($post)
		{
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
			if (self::$conn->query($sql)) {
				$resp['status'] = "ok";
			} else {
				$resp['status'] = "no";
			}
			echo json_encode($resp);
		}
		public static function forgotPassword($post)
		{
			$email = $_POST['email'];
			$sql = "SELECT user_id,password FROM users WHERE email='$email'";
			if ($res = self::$conn->query($sql)) {
				if ($res->num_rows > 0) {
					$row = $res->fetch_assoc();
					$resp['data'] = self::mailTo($email, $row['user_id']);
					$resp['status'] = "ok";
				} else {
					$resp['data'] = "No Data";
					$resp['status'] = "no";
				}
				echo json_encode($resp);
			}
		}
		public static function contacts($post)
		{
			echo json_encode(self::contactmailTo($post));
		}
		public static function contactMailTo($post)
		{
			$name = $post['name'];
			$email = $post['email'];
			$query = $post['query'];
			$phone = "N/A";
			$to = "submissions@archue.com";
			// For testing purpose only.
			// $to = "rizwan.raza987@gmail.com";
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
			$headers = "MIME-Version:1.0" . PHP_EOL;
			$headers .= "Content-Type:text/html;charset=UTF-8";
			$headers .= "From: Archue Contact User <info@archue.com>";

			$sql = "INSERT INTO queries(`name`, `number`, `email`, `msg`, `time`) VALUES ('$name', '$phone', '$email', '$query',  CONVERT_TZ(CURRENT_TIMESTAMP,'+00:00','+05:30'))";
			self::$conn->query($sql);

			return mail($to, $subject, $msg, $headers);
		}
		public static function mailTo($email, $id)
		{
			$hash = md5("ar" . $id . "chue");
			$url = "https://archue.com/reset-password/" . $id . "/" . $hash;
			$to = $email;
			$subject = "Password Reset Request ";
			$message = "Your Password Reset Url is  <b>$url</b>";
			$headers = "MIME-Version:1.0" . PHP_EOL;
			$headers .= "Content-Type:text/html;charset=UTF-8" . PHP_EOL;
			$headers .= "From: Archue Forgot Password <info@archue.com>";
			return mail($to, $subject, $message, $headers);
		}
		public static function searchQuery($post)
		{
			$query = self::$conn->real_escape_string($post['query']);
			$type = $post['type'];
			switch ($type) {
				case "projects":
					$sql = "SELECT * FROM projects WHERE project_name LIKE '%$query' OR project_name LIKE '$query%' OR project_name LIKE '%$query%'";
					$proResp = self::excuteQuery($sql);
					$proResp['type'] = "project";
					echo json_encode($proResp);
					break;
				case "thesis":
					$sql = "SELECT * FROM thesis WHERE thesis_title LIKE '%$query' OR thesis_title LIKE '$query%' OR thesis_title LIKE '%$query%'";
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
				case "material":
					$sql = "SELECT * FROM material_upload WHERE product_name LIKE '%$query' OR specification LIKE '%$query'";
					$resp = self::excuteQuery($sql);
					$resp['type'] = 'material';
					echo json_encode($resp);
					break;
			}
		}
		public static function fetchLead()
		{
			$sql = "SELECT * FROM material ORDER BY material_id DESC";
			echo json_encode(self::excuteQuery($sql));
		}
		public static function uploadPlan($post)
		{
			$pages = self::$conn->real_escape_string($post['pages']);
			$plan_name = self::$conn->real_escape_string($post['plan_name']);
			$impression = self::$conn->real_escape_string($post['impression']);
			$leads = self::$conn->real_escape_string($post['leads']);
			$duration = self::$conn->real_escape_string($post['duration']);
			$price = self::$conn->real_escape_string($post['price']);
			$transaction_id = self::$conn->real_escape_string($post['transaction_id']);
			$user_id = self::$conn->real_escape_string($post['user_id']);
			$sql = "UPDATE  plan_info SET pages = '$pages' , plan_name = '$plan_name', impression = '$impression', leads = '$leads', duration = '$duration', price = '$price', transaction_id = '$transaction_id', plan_update_date = CURRENT_TIMESTAMP() WHERE user_id = $user_id";
			if (self::$conn->query($sql)) {
				$resp['status'] = "ok";
				$resp['message'] = "Succesfully executed";
			} else {
				$resp['status'] = "no";
				$resp['message'] = self::$conn->error;
			}
			echo json_encode($resp);
		}
		public static function fetchPlanInfo($post)
		{
			$id = $post['id'];
			$sql = "SELECT pages,plan_name,duration,plan_update_date,is_show FROM plan_info WHERE user_id=$id ORDER BY plan_id DESC";
			if ($res1 = self::$conn->query($sql)) {
				if ($res1->num_rows > 0) {
					$resp['planinfo'] = $res1->fetch_assoc();
					$sql2 = "SELECT * FROM material_upload WHERE user_id like $id";
					if ($res2 = self::$conn->query($sql2)) {
						if ($res2->num_rows > 0) {
							// $materialupload = $res2->fetch_assoc();
							$arr = array();
							$matarr = array();
							$catArr = [];
							$leadArr = array();
							while ($row2 = $res2->fetch_assoc()) {
								array_push($matarr, $row2);
								if (!in_array($row2['sub_category'], $catArr)) {
									$catArr[] = $row2['sub_category'];
								}
							}
							if (!empty($catArr)) {
								foreach ($catArr as $value) {
									$sql4 = "SELECT * FROM material WHERE product_name like '$value' ORDER BY material_id DESC";
									if ($res4 = self::$conn->query($sql4)) {
										if ($res4->num_rows > 0) {
											while ($row4 = $res4->fetch_assoc()) {
												array_push($leadArr, $row4);
											}
										} else {
											$final['data'] = "no rows in leads";
											$final['status'] = 2;
										}
									} else {
										$final['data'] = self::$conn->error;
										$final['status'] = 2;
									}
								}
							}
							$resp['leads'] = $leadArr;
							$resp['material'] = $matarr;
							$final['data'] = $resp;
							$final['status'] = 1;
						} else {
							$sql3 = "SELECT * FROM material ORDER BY material_id DESC";
							if ($res3 = self::$conn->query($sql3)) {
								if ($res3->num_rows > 0) {
									$arr1 = array();
									while ($row3 = $res3->fetch_assoc()) {
										array_push($arr1, $row3);
									}
									$resp['leads'] = $arr1;
									$final['data'] = $resp;
									$final['status'] = 1;
								} else {
									$final['data'] = "No rows in material leads";
									$final['status'] = 2;
								}
							} else {
								$final['data'] = self::$conn->error;
								$final['status'] = 2;
							}
						}
					} else {
						$final['data'] = self::$conn->error;
						$final['status'] = 2;
					}
				} else {
					$final['data'] = "No rows in plan_info";
					$final['status'] = 2;
				}
			} else {
				$final['data'] = self::$conn->error;
				$final['status'] = 2;
			}
			// if($resp['status']==1){
			// 	$resp1['planinfo'] = $resp['data'];
			// 	$sql1 = "SELECT * FROM material_upload WHERE user_id=$id";
			// 	if($res=self::$conn->query($sql1)){

			// 	}
			// }
			// else{
			// 	$resp['data'] = "Error";
			// 	$resp['status'] = 1;
			// }	
			echo json_encode($final);
		}

		public static function loginWith($post)
		{
			$name = $post['name'];
			$lemail = $post['lemail'];
			$lphone = $post['lphone'];
			$password = $post['password'];
			$lprofession = $post['lprofession'];
			$sql = "INSERT INTO users(name,email,mobileno,profession,password) VALUES('$name','$lemail','$lphone','$lprofession','$password')";
			if (self::$conn->query($sql)) {
				$sql2 = "SELECT user_id,name,profession,company_name,profile FROM users ORDER BY user_id DESC LIMIT 1";
				if ($res = self::$conn->query($sql2)) {
					$resp['data'] = $res->fetch_assoc();
					$resp['status'] = 1;
				} else {
					$resp['data'] = self::$conn->error;
					$resp['status'] = 2;
				}
			} else {

				$resp['data'] = self::$conn->error;
				$resp['status'] = 3;
			}
			echo json_encode($resp);
		}
		public static function excuteQuery($sql)
		{
			$arr = array();
			if ($res = self::$conn->query($sql)) {
				if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()) {
						array_push($arr, $row);
					}
					$resp['data'] = $arr;
					$resp['status'] = 1;
				} else {
					$resp['data'] = [];
					$resp['status'] = 2;
				}
			} else {
				$resp['data'] = self::$conn->error;
				$resp['status'] = 3;
			}
			return $resp;
		}
		public static function updateProfilePhoto($file, $id) {
			$location = "../uploads/";
			$filename = str_replace(" ", "_", $file['name']);
			if (move_uploaded_file($file['tmp_name'], $location . "" . $filename)) {
				$sql = "UPDATE users SET profile='$filename' WHERE user_id=$id";
				if (self::$conn->query($sql)) {
					$resp['status'] = "ok";
					$sql2 = "SELECT user_id,name,profession,company_name,profile FROM users WHERE user_id=$id";
					$res = self::$conn->query($sql2);
					$row = $res->fetch_assoc();
					$resp['message'] = $row;
				} else {
					$resp['status'] = "no";
					$resp['message'] = self::$conn->error;
				}
				echo json_encode($resp);
			}
		}
		public static function getUserprofile($username) {
			$sql = "SELECT * from users WHERE username='$username'";
			if ($result = self::$conn->query($sql)) {
				if ($result->num_rows > 0) {										
					$row = $result->fetch_assoc();
					$row['password'] = '';
					$resp['data'] = $row;
					$resp['message'] = "Succefully fetched";
					$resp['status'] = true;
				} else {
					$resp['data'] = null;
					$resp['message']="No Data found";
					$resp['status'] = false;
				}
			} else {
				$resp['data'] = self::$conn->error;
				$resp['message']="Query error";
				$resp['status'] = false;
			}
			echo json_encode($resp);
		}
		public static function resetPassword($post)
		{
			extract($post);
			$myHash = md5("ar" . $id . "chue");
			if ($myHash == $hash) {
				$password = md5($password);
				$sql = "UPDATE users SET password='$password' WHERE user_id=$id";
				if (self::$conn->query($sql)) {
					$resp['status'] = "ok";
					$resp['message'] = "You Have Succefully Update Password.";
				} else {
					$resp['status'] = "no";
					$resp['message'] = "Query Error.";
				}
			} else {
				$resp['status'] = "no";
				$resp['message'] = "Please check your email.You will get the right url there because the url you have entered is wrong.";
			}
			echo json_encode($resp);
		}

		public static function subscribeNewsletter($post)
		{
			extract($post);
			$sql = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";
			if ($result = self::$conn->query($sql)) {
				if ($result->num_rows > 0) {
					$resp['status'] = false;
					$resp['message'] = "You have already subscribed";
				} else {
					$sql = "INSERT INTO newsletter_subscribers(name, email) VALUES('$name', '$email')";
					if (self::$conn->query($sql)) {
						$resp['status'] = true;
						$resp['message'] = "You Have Succefully Subscribed our newsletter.";
					} else {
						$resp['status'] = false;
						$resp['message'] = "Insert Query Error.";
					}
				}
			} else {
				$resp['status'] = false;
				$resp['message'] = "SELECT Query Error.";
			}
			echo json_encode($resp);
		}

		public static function applyReferral($post)
		{
			extract($post);
			$sql = "SELECT user_id FROM magazine_subscription WHERE referral_code = '$referralCode'";
			if ($result = self::$conn->query($sql)) {
				if ($result->num_rows > 0) {
					$resp['status'] = true;
					$resp['message'] = "Referral Code Applied";
					$resp['data'] = $result->fetch_assoc();
				} else {
					$resp['status'] = false;
					$resp['message'] = "Referral is not matched with our server";
				}
			} else {
				$resp['status'] = false;
				$resp['message'] = "Connection Error";
			}
			echo json_encode($resp);
		}

		public static function subscribeMagazine($post)
		{
			$referralCode = self::random_strings(6);
			extract($post);
			$sql = "INSERT INTO magazine_subscription(duration, price, currency, order_id, expiry_status, user_id, 	referred_by, referral_code) VALUES('$duration', $price, '$currency', '$order_id', 1, $user_id, $referred_by, '$referralCode')";
			if (self::$conn->query($sql)) {
				$resp['status'] = true;
				$resp['message'] = "You have Succesfully Subscribed";

				if ($referred_by) {
					if ($currency == 'USD') {
						$earning = (($oldPrice * 5) / 100) * 70;
					} else {
						$earning = ($oldPrice * 5) / 100;
					}

					$sql = "SELECT * FROM referral_earnings WHERE user_id = $referred_by";
					$result = self::$conn->query($sql);
					if ($result->num_rows > 0) {
						$sql = "UPDATE referral_earnings SET amount = amount + $earning WHERE user_id = $referred_by";
						self::$conn->query($sql);
					} else {
						$sql = "INSERT INTO referral_earnings(amount, currency, user_id) VALUES('$earning', 'INR', $referred_by)";
						self::$conn->query($sql);
					}
				}
			} else {
				$resp['status'] = false;
				$resp['message'] = "Connection Error";
				$resp['error'] = self::$conn->error;
			}
			echo json_encode($resp);
		}

		// This function will return a random 
		// string of specified length 
		public function random_strings($length_of_string)
		{
			// String of all alphanumeric character 
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

			// Shufle the $str_result and returns substring 
			// of specified length 
			return substr(
				str_shuffle($str_result),
				0,
				$length_of_string
			);
		}
	}
	App::setConnect();
	?>