<?php
require_once("db-connect.php");
class App extends Conn
{
	private static $conn;
	public static function setConnect()
	{
		self::$conn = self::connect();
	}

	public static function login($post)
	{
		$username = self::$conn->real_escape_string($post['username']);
		$password = self::$conn->real_escape_string($post['password']);
		$sql = "SELECT username,admin_id FROM admin WHERE username='$username' AND password='$password'";
		$queryRes = self::queryrun($sql);
		echo json_encode($queryRes);
	}

	public static function uploadBLog($file, $post)
	{
		$blog_heading = self::$conn->real_escape_string($post['blog_heading']);
		$blog_category = self::$conn->real_escape_string($post['blog_category']);
		$myBlog = self::$conn->real_escape_string($post['myBlog']);
		$id = $post['id'];
		if (self::upload_file($file)) {
			$filename = str_replace(" ", "_", $file['name']);
			$sql = "INSERT INTO blog(heading,category,blog_file,html_content,blog_date,blog_time,user_id) VALUES('$blog_heading','$blog_category','$filename','$myBlog',NOW(),NOW(),$id)";
			if (self::$conn->query($sql)) {
				$resp['status'] = "yes";
				$resp['message']  = "succesfully run";
			} else {
				$resp['status'] = "no";
				$resp['message']  = "error";
			}
			echo json_encode($resp);
		} else {
			echo json_encode("not upload blog file");
		}
	}

	public static function addEMagazine($magazine, $cover_image, $post)
	{
		$name = self::$conn->real_escape_string($post['name']);
		$magazine_description = self::$conn->real_escape_string($post['magazine_description']);

		$location = "../../upload-file/magazines/";
		$magazinefilename = str_replace(" ", "_", $magazine['name']);
		$cover_imagefilename = str_replace(" ", "_", $cover_image['name']);
		if (move_uploaded_file($magazine['tmp_name'], $location . $magazinefilename) && move_uploaded_file($cover_image['tmp_name'], $location . $cover_imagefilename)) {
			$sql = "INSERT INTO emagazine(name, description, cover_image, magazine) VALUES('$name', '$magazine_description', '$cover_imagefilename', '$magazinefilename')";

			if (self::$conn->query($sql)) {
				$resp['status'] = true;
			} else {
				unlink($location .  $magazinefilename);
				unlink($location . $cover_imagefilename);
				$resp['status'] = false;
				$resp['message'] = "Query Error !";
			}
		} else {
			$resp['status'] = false;
			$resp['message'] = "Upload Error";
		}
		echo json_encode($resp);
	}

	public function getEMagazine()
	{
		$sql = "SELECT * FROM emagazine ORDER BY id DESC";
		echo json_encode(self::queryrun($sql));
	}

	public static function upload_file($file)
	{
		$location = "../../upload-file/";
		$filename = str_replace(" ", "_", $file['name']);
		return move_uploaded_file($file['tmp_name'], $location . $filename);
	}

	/*Blog Delete And Approve*/
	public static function deleteBlog($post)
	{
		$id = 	$post['id'];
		/* Deleting Blog */
		$sql2 = "DELETE FROM blog WHERE blog_id=$id";
		echo json_encode(self::del_app($sql2));
	}
	public static function approveBlog($id)
	{
		$sql = "UPDATE blog SET is_approve=1 WHERE blog_id=$id";
		echo json_encode(self::del_app($sql));
	}

	/* Comments Approve and Delete of Any Blogs */
	public function deleteBlogComment($post)
	{
		$id = 	$post['comment_id'];
		$sql = "DELETE FROM comments WHERE id=$id";
		echo json_encode(self::del_app($sql));
	}
	public function approveBlogComment($post)
	{
		$id = 	$post['comment_id'];
		$sql = "UPDATE comments SET is_approved = 1 WHERE id=$id";
		echo json_encode(self::del_app($sql));
	}

	/*Event Delete And Approve*/
	public static function deleteEvent($post)
	{
		$id = 	$post['id'];
		echo json_encode($id);
		$sql = "DELETE FROM events WHERE event_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveEvent($id)
	{
		$sql = "UPDATE events SET is_approve=1 WHERE event_id=$id";
		echo json_encode(self::del_app($sql));
	}


	/*Job Delete And Approve*/
	public static function deleteJob($post)
	{
		$id = 	$post['id'];
		echo json_encode($id);
		$sql = "DELETE FROM jobs WHERE job_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveJob($id)
	{
		$sql = "UPDATE jobs SET is_approve = 1 WHERE job_id = $id";
		echo json_encode(self::del_app($sql));
	}


	/*Competiton Delete And Approve*/
	public static function deleteComp($post)
	{
		$id = 	$post['id'];
		echo json_encode($id);
		$sql = "DELETE FROM competition WHERE competitor_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveCompetition($id)
	{
		$sql = "UPDATE competition SET is_approve = 1 WHERE competitor_id = $id";
		echo json_encode(self::del_app($sql));
	}


	/*Project Delete And Approve*/
	public static function approveProject($post)
	{
		$id = $post['id'];

		$sql1 = "SELECT email FROM users WHERE user_id = (SELECT user_id FROM projects WHERE project_id = $id)";
		if ($res = self::$conn->query($sql1)) {
			if ($res->num_rows > 0) {
				$row = $res->fetch_assoc();

				$to = $row['email'];
				$subject = "Your Project Confirmation on Archue !!";

				$message = "
					<table style='width: 100%;' border='1'>
						<tr style='width: 100%;'>
							<td><img style='width:100%' src='https://archue.com/image/Project_approval_mail.jpg' /></td>
						</tr>
						<tr style='width: 100%;'>
							<td>Project Link: <a href='https://archue.com/full-project/$id/project-name'>Click Me!</a></td>
						</tr>
					</table>
					";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: Archue Project Approve<info@archue.com>";

				if (mail($to, $subject, $message, $headers)) {
					$sql2 = "UPDATE projects SET project_approve=1 WHERE project_id=$id";
					echo json_encode(self::del_app($sql2));
				}
			}
		}
	}
	public static function deleteProject($post)
	{
		$id = $post['id'];
		$sql = "DELETE FROM projects WHERE project_id=$id";
		echo json_encode(self::del_app($sql));
	}


	/*Portfolio Delete and Approve*/
	public static function deletePortfolio($post)
	{
		$id = $post['id'];
		$sql = "DELETE FROM portfolio WHERE portfolio_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approvePortfolio($id)
	{
		$sql = "UPDATE portfolio SET portfolio_approve=1 WHERE portfolio_id=$id";
		echo json_encode(self::del_app($sql));
	}


	/*Thesis Report Delete and Approve*/
	public static function deleteThesisReport($post)
	{
		$id = $post['id'];
		$sql = "DELETE FROM thesis_report WHERE thesis_report_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveThesisReport($id)
	{
		$sql = "UPDATE thesis_report SET thesis_report_approve=1 WHERE thesis_report_id=$id";
		echo json_encode(self::del_app($sql));
	}


	/*Dessertation Delete and Approve*/
	public static function deleteDessertation($post)
	{
		$id = $post['id'];
		$sql = "DELETE FROM dessertation WHERE dessertation_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveDessertation($id)
	{
		$sql = "UPDATE dessertation SET dessertation_approve = 1 WHERE dessertation_id=$id";
		echo json_encode(self::del_app($sql));
	}

	// architect delete 
	public static function deleteArchitect($post)
	{
		extract($post);
		$sql = "DELETE FROM architect WHERE architect_id=$id";
		echo json_encode(self::del_app($sql));
	}

	// delete material request

	public static function deleteMaterialReq($post)
	{
		extract($post);
		$sql = "DELETE FROM material WHERE material_id=$id";
		echo json_encode(self::del_app($sql));
	}

	/*Thesis Delete And Approve*/
	public static function deleteThesis($post)
	{
		$id = $post['id'];
		$sql = "DELETE FROM thesis WHERE thesis_id=$id";
		echo json_encode(self::del_app($sql));
	}
	public static function approveThesis($post)
	{
		$id = $post['id'];
		$sql = "UPDATE  thesis SET thesis_approve=1 WHERE thesis_id=$id";
		echo json_encode(self::del_app($sql));
	}


	public static function fetchArchitect()
	{
		$sql = "SELECT * FROM architect ORDER BY architect_id DESC";
		echo json_encode(self::queryrun($sql));
	}
	public static function fetchMaterialRequest()
	{
		$sql = "SELECT * FROM material ORDER BY material_id DESC";
		echo json_encode(self::queryrun($sql));
	}


	public static function fetchUsers()
	{
		$sql = "SELECT user_id,user_date,name,email,mobileno,profession FROM users ORDER BY user_id DESC";
		$arr = array();
		if ($res = self::$conn->query($sql)) {
			if ($res->num_rows > 0) {
				while ($row = $res->fetch_assoc()) {
					$sql1 =  "SELECT * FROM payment WHERE user_id = $row[user_id]";
					if ($res1 = self::$conn->query($sql1)) {
						if ($res1->num_rows > 0) {
							$row['throughLead'] = true;
						} else {
							$row['throughLead'] = false;
						}
					} else {
						$row['throughLead'] = false;
					}
					array_push($arr, $row);
				}
				$resp['data'] = $arr;
				$resp['status'] = "ok";
			} else {
				$resp['data'] = "no rows found";
				$resp['status'] = "no";
			}
		} else {
			$resp['data'] = self::$conn->error;
			$resp['status'] = "no";
		}
		echo json_encode($resp);
	}

	public static function newsletter_users()
	{
		$sql = "SELECT * FROM newsletter_subscribers ORDER BY id DESC";
		echo json_encode(self::queryrun($sql));
	}

	public static function deleteUser($post)
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

	public static function del_app($sql)
	{
		if (self::$conn->query($sql)) {
			$resp['data'] = "succesfully excuted";
			$resp['status'] = "ok";
		} else {
			$resp['data'] = self::$conn->error;
			$resp['status'] = "no";
		}
		return $resp;
	}

	public static function  fetchProFeedback($post)
	{
		$id = $post['id'];
		$sql = "SELECT * FROM project_upload_feedback WHERE project_id=$id";
		echo json_encode(self::queryrun($sql));
	}

	public static function fectUploadedMat()
	{
		$sql = "SELECT * FROM material_upload ORDER BY material_upload_id DESC";
		echo json_encode(self::queryrun($sql));
	}

	public function deleteMaterial($id)
	{
		$sql = "DELETE FROM material_upload WHERE material_upload_id = $id";
		echo json_encode(self::del_app($sql));
	}

	public static function addToHomeScreen($post)
	{
		$id = $post['id'];
		$sql = "UPDATE material_upload SET arbitory_show = 1 WHERE material_upload_id = $id";
		if (self::$conn->query($sql)) {
			$resp['data'] = true;
		} else {
			$resp['data'] = false;
		}
		echo json_encode($resp);
	}

	public static function removeFromHomeScreen($post)
	{
		$id = $post['id'];
		$sql = "UPDATE material_upload SET arbitory_show = 0 WHERE material_upload_id = $id";
		if (self::$conn->query($sql)) {
			$resp['data'] = true;
		} else {
			$resp['data'] = false;
		}
		echo json_encode($resp);
	}

	public static function queryrun($sql)
	{
		$arr = array();
		if ($res = self::$conn->query($sql)) {
			if ($res->num_rows > 0) {
				while ($row = $res->fetch_assoc()) {
					array_push($arr, $row);
				}
				$resp['data'] = $arr;
				$resp['status'] = "ok";
			} else {
				$resp['data'] = "no rows found";
				$resp['status'] = "no";
			}
		} else {
			$resp['data'] = self::$conn->error;
			$resp['status'] = "no";
		}
		return $resp;
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
		}
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
	public static function uploadLead($post){
		$name = self::$conn->real_escape_string($post['name']);
		$phone = self::$conn->real_escape_string($post['phone']);
		$email = self::$conn->real_escape_string($post['email']);
		$tentativeBudget = self::$conn->real_escape_string($post['tentativeBudget']);
		$workType = self::$conn->real_escape_string($post['workType']);
		$city = self::$conn->real_escape_string($post['city']);
		$leadType = self::$conn->real_escape_string($post['leadType']);
		$cost = self::$conn->real_escape_string($post['cost']);
		$personCount = self::$conn->real_escape_string($post['person_count']);
		$expectedStartTime = self::$conn->real_escape_string($post['expectedStartTime']);
		$description = self::$conn->real_escape_string($post['description']);
		$sql = "INSERT INTO leads(name,phone,email,tentativeBudget,workType,city,leadType, expectedStartTime, cost, person_count, description) VALUES('$name','$phone','$email',$tentativeBudget,'$workType','$city', '$leadType', '$expectedStartTime', $cost, $personCount, '$description')";
		if (self::$conn->query($sql)) {
			$resp['status'] = true;
			$resp['message']  = "You have successfully submit the lead";
		} else {
			$resp['status'] = false;
			$resp['message']  = "Something went wrong";
		}
		echo json_encode($resp);
	}
	public static function updateLeadById($post) {
		$name = self::$conn->real_escape_string($post['name']);
		$phone = self::$conn->real_escape_string($post['phone']);
		$email = self::$conn->real_escape_string($post['email']);
		$tentativeBudget = self::$conn->real_escape_string($post['tentativeBudget']);
		$workType = self::$conn->real_escape_string($post['workType']);
		$city = self::$conn->real_escape_string($post['city']);
		$leadType = self::$conn->real_escape_string($post['leadType']);
		$cost = self::$conn->real_escape_string($post['cost']);
		$personCount = self::$conn->real_escape_string($post['person_count']);
		$expectedStartTime = self::$conn->real_escape_string($post['expectedStartTime']);
		$description = self::$conn->real_escape_string($post['description']);
		$id = $post['lead_id'];
		$sql = "UPDATE leads SET name = '$name',phone = '$phone',email = '$email',tentativeBudget = $tentativeBudget,workType = '$workType',city = '$city',leadType = '$leadType', expectedStartTime = '$expectedStartTime', cost = $cost, person_count = $personCount, description = '$description' WHERE lead_id = $id";

		if (self::$conn->query($sql)) {
			$resp['status'] = true;
			$resp['message']  = "You have successfully updated the lead";
		} else {
			$resp['status'] = false;
			$resp['message']  = "Something went wrong";
		}
		echo json_encode($resp);
	}
}
App::setConnect();
