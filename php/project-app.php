<?php
    

    require_once("db-connect.php");

	class ProjectApp extends Conn
	{
		private static $conn;
		public static function setConnect()
		{
			self::$conn = self::connect();
        }
        public static function incrementProjectviews($id) {
            $sql = "UPDATE projects SET views = views + 1 WHERE project_id=$id";
            if (self::$conn->query($sql)) {
                echo 'succefully update';
            } else {
                echo 'error'.self::$conn->error;
            }
        }
        public static function incrementProjectLikes($id) {
            session_start();            
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
                $sql = "SELECT * FROM likes WHERE user_id = $userId && project_id = $id";
                if($res = self::$conn->query($sql)) {
                    if ($res->num_rows > 0) {
                        $sql1 = "UPDATE projects SET likes = likes-1 WHERE project_id = $id";
                        if (self::$conn->query($sql1)) {
                            $sql2 = "DELETE FROM likes WHERE user_id=$userId && project_id=$id";
                            if (self::$conn->query($sql2)) {
                                echo 'successfully decrement';
                            } else {
                                echo 'error in delete row from likes'.self::$conn->error;
                            }
                        } else {
                            echo 'error in decremnt likes'.self::$conn->error;;
                        }
                    } else {
                        
                        $sql3 = "INSERT INTO likes(project_id, user_id) VALUES($id, $userId)";
                        if (self::$conn->query($sql3)) {
                            $sql4 = "UPDATE projects SET likes = likes + 1 WHERE project_id = $id";
                            if (self::$conn->query($sql4)) {
                                echo 'succesfully';
                            } else {
                                echo 'error in incrment likes'.self::$conn->error;;
                            }
                        } else {
                            echo 'error in insert likes'.self::$conn->error;;
                        }

                    }
                } else {
                    echo "error".self::$conn->error;;
                }

            } else {
                echo "You are not logged in";
            }
        }
    }
	ProjectApp::setConnect();
?>