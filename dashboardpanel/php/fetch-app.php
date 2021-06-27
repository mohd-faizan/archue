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
					$row1 = self::fetchUser($row['user_id']);
					$row = $row1+$row;
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
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
					$row1 = self::fetchUser($row['user_id']);
					$row = $row1+$row;
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
					$row1 = self::fetchUser($row['user_id']);
					$row = $row1+$row;
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
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
	
	public static function fetchUser($id){
		$sql = "SELECT name FROM users WHERE user_id=$id";
		$res = self::$conn->query($sql);
		$row = $res->fetch_assoc();
		return $row;
	}
	
	public static function fetchBlog(){
		$sql = "SELECT * FROM blog ORDER BY blog_id DESC,blog_date DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
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
	
	public static function fetchBlogsComment(){
		$arr = array();
		$sql = "SELECT * FROM comments ORDER BY id DESC";
		if($res = self::$conn->query($sql)){
            while ($blogcomment = $res->fetch_assoc()) {
				$resp['comment'] = $blogcomment;
				if ($blogcomment['blog_id']) {
					$sql2 = "SELECT * FROM blog WHERE blog_id = $blogcomment[blog_id]";
				} else {
					$sql2 = "SELECT * FROM competition WHERE competitor_id = $blogcomment[competition_id]";
				}
				if($res2 = self::$conn->query($sql2)){
					$resp['data'] = $res2->fetch_assoc();
					array_push($arr, $resp);
				}
            }
			$finalResp['status'] = "yes";
			$finalResp['data'] = $arr;
		}
		else{
			$finalResp['status'] = "no";
		}
		echo json_encode($finalResp);
	}

	public function fetchCommentsOfBlog($id) {
		$commentsArr = [];
		$sql = "SELECT * FROM blogcomments WHERE blog_id = $id AND is_approved = 1 ORDER BY id DESC";
		if($res = self::$conn->query($sql)) {
			if($res->num_rows > 0 ) {
				while($row = $res->fetch_assoc()) {
					array_push($commentsArr, $row);
				}
				$resp['data'] = $commentsArr;
				$resp['status'] = 'Ok';
			}else {
				$resp['status'] = "No";
			}
		}else {
			$resp['status'] = 'No';
		}
		echo json_encode($resp);
	}
	
	public static function fetchThesis(){
		$sql = "SELECT * FROM thesis ORDER BY thesis_id DESC,thesis_date DESC";
		$arr = array();
		if($res=self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				$row1 = self::fetchUser($row['user_id']);
				$row = $row1+$row;
				array_push($arr,$row);
			}
			echo json_encode($arr);
		}
		else{
			echo json_encode("Not running thesis query");
		}
	}
	
	public static function fetchEvents(){
		$sql = "SELECT * FROM events ORDER BY event_id DESC,event_date DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['status'] = "yes";
			$resp['data'] = $arr;
		}
		else{
			$resp['status'] = "no";
			$resp['data'] = "query error";
		}
		echo json_encode($resp);
	}
	
	public static function fetchJob(){
		$sql = "SELECT * FROM jobs ORDER BY job_id DESC,job_date DESC";
			$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['status'] = "yes";
			$resp['data'] = $arr;
		}
		else{
			$resp['status'] = "no";
			$resp['data'] = "query error";
		}
		echo json_encode($resp);
	}
	
	public static function fetchCompetitor(){
		$sql = "SELECT * FROM competition ORDER BY competitor_id DESC,competitor_date DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['status'] = "yes";
			$resp['data'] = $arr;
		}
		else{
			$resp['status'] = "no";
			$resp['data'] = self::$conn->error;
		}
		echo json_encode($resp);
	}
	public static function fetchLeads() {
		$sql = "SELECT * FROM leads ORDER BY lead_id DESC";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				array_push($arr, $row);
			}
			$resp['status'] = true;
			$resp['data'] = $arr;
		}
		else{
			$resp['status'] = false;
			$resp['data'] = self::$conn->error;
		}
		echo json_encode($resp);
	}
	public static function deleteLead($id) {
		$sql = "DELETE FROM leads WHERE lead_id = $id";
		if (self::$conn->query($sql)) {
			echo "succefully deleted";
		} else {
			echo "Error ".self::$conn->error;
		}
	}
	public static function getLeadById($id) {
		$sql = "SELECT * FROM leads WHERE lead_id = $id";
		$arr = array();
		if($res = self::$conn->query($sql)){
			while($row = $res->fetch_assoc()){
				$row = array_push($arr, $row);
			}
			$resp['status'] = true;
			$resp['data'] = $arr;
		}
		else{
			$resp['status'] = false;
			$resp['data'] = self::$conn->error;
		}
		echo json_encode($resp);
	}
	public static function fetchCount(){

		$sql = "SELECT COUNT(is_approve) As blogUnapprove from blog WHERE is_approve = 0";
		$res = self::$conn->query($sql);
		$resp['blogUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(project_approve) As projectUnapprove from projects WHERE project_approve = 0";
		$res = self::$conn->query($sql);
		$resp['projectUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(portfolio_approve) As portfolioUnapprove from portfolio WHERE portfolio_approve = 0";
		$res = self::$conn->query($sql);
		$resp['portfolioUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(thesis_report_approve) As thesisReportUnapprove from thesis_report WHERE thesis_report_approve = 0";
		$res = self::$conn->query($sql);
		$resp['thesisReportUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(dessertation_approve) As dessertationUnapprove from dessertation WHERE dessertation_approve = 0";
		$res = self::$conn->query($sql);
		$resp['dessertationUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(thesis_approve) As thesisUnapprove from thesis WHERE thesis_approve = 0";
		$res = self::$conn->query($sql);
		$resp['thesisUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(is_approve) As eventUnapprove from events WHERE is_approve = 0";
		$res = self::$conn->query($sql);
		$resp['eventUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(is_approve) As jobUnapprove from jobs WHERE is_approve = 0";
		$res = self::$conn->query($sql);
		$resp['jobUnapprove'] = $res->fetch_assoc();

		$sql = "SELECT COUNT(is_approve) As competitionUnapprove from competition WHERE is_approve = 0";
		$res = self::$conn->query($sql);
		$resp['competitionUnapprove'] = $res->fetch_assoc();
		
		$sql = "SELECT COUNT(is_approved) As blogCommentsUnapprove from comments WHERE is_approved = 0";
		$res = self::$conn->query($sql);
		$resp['blogCommentsUnapprove'] = $res->fetch_assoc();


		echo json_encode($resp);
	}
}
FetchApp::setConnect();
?>
