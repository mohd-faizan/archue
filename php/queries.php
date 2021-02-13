<?php 

$salt = "*WAMP*";
$anotherOne = date("y");
$token = md5($salt.$anotherOne.$salt);

if(!isset($_REQUEST['token'])) {
    // echo json_encode($_REQUEST);
    echo '{"token":"not_provided"}';
} else if ($_REQUEST['token'] == $token) {
    require "db-connect.php";
    class Queries extends Conn {
        public static function getConnect() {
            return self::connect();
        }
    }
    $conn = Queries::getConnect();
    switch($_SERVER['REQUEST_METHOD']) {

        case "GET":

        $sql = "SELECT * FROM queries".
        (isset($_GET['id']) ? " WHERE _qid=".$_GET['id'] : "").
        (isset($_GET['order']) ? " ORDER BY ".$_GET['order'].(isset($_GET['sort']) ? " ".$_GET['sort'] : "") : "").
        (isset($_GET['limit']) ? " LIMIT ".(isset($_GET['offset']) ? $_GET['offset'].", " : "").$_GET['limit'] : "");


        // echo $sql;

        $result = $conn->query($sql);

        if($result) {
            $json = array();
            while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
            }
            echo json_encode($json);
        }

        break;
        
        case "DELETE": 

        if(isset($_REQUEST['qid'])) {
            $sql = "DELETE FROM queries WHERE _qid=".$_REQUEST['qid'];
            if($conn->query($sql)) {
                echo '{"status":true}';
            } else {
                echo '{"status":false}';
            }
        } else {
            echo '{"qid":"not_provided"}';
        }

        break;
        
        default:

        echo '{"method_type":"invalid"}';
        
    }    
} else {
    echo '{"token":"invalid"}';    
}
?>
