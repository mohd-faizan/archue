<?php
	require_once("db-connect.php");
	class App extends Conn{
		private static $conn;
		public static function setConnect(){
			self::$conn = self::connect();
		} 
		public static function login($post){
			$username = self::$conn->real_escape_string($post['username']);
			$password = self::$conn->real_escape_string($post['password']);
			$sql = "SELECT username,admin_id FROM admin WHERE username='$username' AND password='$password'";
			$queryRes = self::queryrun($sql);
			echo json_encode($queryRes);
		}
		public static function uploadBLog($file,$post){
			$blog_heading = self::$conn->real_escape_string($post['blog_heading']);
			$blog_category = self::$conn->real_escape_string($post['blog_category']);
			$myBlog = self::$conn->real_escape_string($post['myBlog']);
			$id = $post['id'];
			if(self::upload_file($file)){
				$filename = str_replace(" ", "_", $file['name']);
				$sql = "INSERT INTO blog(heading,category,blog_file,html_content,blog_date,blog_time,user_id) VALUES('$blog_heading','$blog_category','$filename','$myBlog',NOW(),NOW(),$id)";
				if(self::$conn->query($sql)){
					$resp['status'] = "yes";
					$resp['message']  = "succesfully run";
				}
				else{
					$resp['status'] = "no";
					$resp['message']  = "error";
				}
				echo json_encode($resp);
			}
			else{
				echo json_encode("not upload blog file");
			}
		}
		public static function upload_file($file){
			$location = "../../upload-file/";
			$filename = str_replace(" ", "_", $file['name']);
			return move_uploaded_file($file['tmp_name'],$location.$filename);
		}
		public static function deleteBlog($post){
			$id = 	$post['id'];
			$sql = "DELETE FROM blog WHERE blog_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function approveProject($post){
			$id = $post['id'];
			$sql = "UPDATE projects SET project_approve=1 WHERE project_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function deleteProject($post){
			$id = $post['id'];
			$sql = "DELETE FROM projects WHERE project_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function deletePortfolio($post){
			$id = $post['id'];
			$sql = "DELETE FROM portfolio WHERE portfolio_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function deleteThesisReport($post){
			$id = $post['id'];
			$sql = "DELETE FROM thesis_report WHERE thesis_report_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function deleteDessertation($post){
			$id = $post['id'];
			$sql = "DELETE FROM dessertation WHERE dessertation_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function deleteThesis($post){
			$id = $post['id'];
			$sql = "DELETE FROM thesis WHERE thesis_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function approveThesis($post){
			$id = $post['id'];
			$sql = "UPDATE  thesis SET thesis_approve=1 WHERE thesis_id=$id";
			echo json_encode(self::del_app($sql));
		}
		public static function fetchArchitect(){
			$sql = "SELECT * FROM architect ORDER BY architect_id DESC";
			echo json_encode(self::queryrun($sql));
		}
		public static function fetchMaterialRequest(){
			$sql = "SELECT * FROM material ORDER BY material_id DESC";
			echo json_encode(self::queryrun($sql));
		}
		public static function del_app($sql){
			if(self::$conn->query($sql)){
				$resp['data'] = "succesfully excuted";
				$resp['status'] = "ok";
			}
			else{
				$resp['data'] = "not executed";
				$resp['status'] = "no";
			}
			return $resp;
		}
		public static function queryrun($sql){
			$arr = array();
			if($res = self::$conn->query($sql)){
				if($res->num_rows>0){
					while($row = $res->fetch_assoc()){
						array_push($arr, $row);
					}
					$resp['data'] = $arr;
					$resp['status'] = "ok";
				}
				else{
					$resp['data']="no rows found";
					$resp['status'] = "no";
				}
			}
			else{
				$resp['data']="query error";
				$resp['status'] = "no";
			}
			return $resp;
		}
	}
	App::setConnect();
?>

