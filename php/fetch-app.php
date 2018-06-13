<?php 
require_once("db-connect.php");
class FetchApp extends Conn{
	private static $conn;
	public static function setConnect(){
		self::$conn = self::connect();
	} 
	public static function fetchProject(){
		$sql = "SELECT * FROM projects ORDER BY project_date DESC,project_time DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			if($res->num_rows>0){
				while($row = $res->fetch_assoc()){
					array_push($arr, $row);
				}
				$resp['status'] = "yes";
				$resp['data'] = $arr;
				$resp['message'] = "Successfully fetched Project"; 
			}
			else{
				$resp['status'] = "no";
				$resp['data'] = "";
				$resp['message'] = "No project finds";
			}
		}
		else{
			$resp['status'] = "no";
			$resp['data'] = "";
			$resp['message'] = self::$conn->error;
		}
		echo json_encode($resp);
	}
	public static function  fetchPortfolio(){
		$sql = "SELECT * FROM portfolio ORDER BY portfolio_id DESC,portfolio_time DESC";
		if($result = self::$conn->query($sql)){
			$arr = array();
			while($row = $result->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['data'] = $arr;
			$resp['status'] = "yes";
		}
		else{
			$resp['data'] = "fetch portfolio query fail";
			$resp['status'] = "no";
		}
			echo json_encode($resp);
	}
	public static function fetchDessertation(){
		$sql = "SELECT * FROM dessertation ORDER BY dessertation_id DESC,dessertation_time DESC";
		if($result = self::$conn->query($sql)){
			$arr = array();
			while($row = $result->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['data'] = $arr;
			$resp['status'] = "yes";
		}
		else{
			$resp['data'] = "fetch desseratation query fail";
			$resp['status'] = "no";
		}
		echo json_encode($resp);
	}
	public static function fetchStudentProject(){
		$sql = "SELECT * FROM projects WHERE user_id IN (SELECT user_id FROM users WHERE profession = 'Student')";
		if($result = self::$conn->query($sql)){
			$arr = array();
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					array_push($arr, $row);
				}
				$resp['data'] = $arr;
				$resp['status'] = "yes";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "No project found";
			}
		}
		else{
			$resp['status'] = "no";
			$resp['message'] = "Student project Query Error";
		}
		echo json_encode($resp);
	}
	public static function fetchThesisReport(){
		$sql = "SELECT * FROM thesis_report ORDER BY thesis_report_id DESC,thesis_report_time DESC";
		if($result = self::$conn->query($sql)){
			$arr = array();
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					array_push($arr, $row);
				}
				$resp['data'] = $arr;
				$resp['status'] = "yes";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "No project found";
			}
		}
		else{
			$resp['status'] = "no";
			$resp['message'] = "Student project Query Error";
		}
		echo json_encode($resp);
	}
	public static function similarThesisReport($post){
		$id = $post['id'];
		$sql = "SELECT * FROM thesis_report WHERE thesis_report_id != $id";
		if($result=self::$conn->query($sql)){
			$arr = array();
			while($row=$result->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['data'] = $arr;
			$resp['status'] = "yes";
			echo json_encode($resp);
		}
		else{
			echo json_encode("error in similar thesis report");
		}
	}
	public static function fetchSimilarPort($ide){
		$id = $ide;
		$sql = "SELECT * FROM portfolio WHERE portfolio_id != $id";
		if($result=self::$conn->query($sql)){
			$arr = array();
			while($row=$result->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['data'] = $arr;
			$resp['status'] = "yes";
			echo json_encode($resp);
		}
		else{
			echo json_encode("error in similar portfolio");
		}
	} 
	public static function fetchSimiDesser($post){
		$id = $post['id'];
		$sql = "SELECT * FROM dessertation WHERE dessertation_id != $id";
		if($result=self::$conn->query($sql)){
			$arr = array();
			while($row=$result->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['data'] = $arr;
			$resp['status'] = "yes";
			echo json_encode($resp);
		}
		else{
			echo json_encode("error in similar dessertation");
		}
	}
	public static function fetchBlog(){
		$sql = "SELECT * FROM blog ORDER BY blog_id DESC,blog_date DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['resp'] = $arr;
			$resp['status'] = "yes";
		}
		else{
			$resp['resp'] = "Query Error";
			$resp['status'] = "no";	
		}
		echo json_encode($resp);
	}
}
FetchApp::setConnect();
?>
