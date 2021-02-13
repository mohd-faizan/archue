<?php

if (isset($_COOKIE['isLoggedIn'])) {
    require_once("../db-connect.php");
    class User extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

        public static function hasEMagazinesAccess($id)
        {
            $sql = "SELECT * FROM magazine_subscription WHERE user_id = $id";
            $res = self::$conn->query($sql);
            if ($res->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function hasMagazineSubscription($id)
        {
            $sql = "SELECT * FROM magazine_subscription WHERE user_id = $id";
            $res = self::$conn->query($sql);
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $resp['duration'] = $row['duration'];
                $resp['referralCode'] = $row['referral_code'];
                $resp['status'] = true;
            } else {
                $resp['status'] = false;
            }
            echo json_encode($resp);
        }

        public static function getEMagazines()
        {
            if (self::hasEMagazinesAccess($_COOKIE['user_id'])) {
                $sql = "SELECT * FROM emagazine ORDER BY id DESC";
                $res = self::$conn->query($sql);
                $magazines = array();
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        array_push($magazines, $row);
                    }
                    $resp['magazines'] = $magazines;
                    $resp['status'] = true;
                } else {
                    $resp['status'] = false;
                }
            } else {
                $resp['status'] = false;
            }
            echo json_encode($resp);
        }

        public static function getEMagazine($id)
        {
            if (self::hasEMagazinesAccess($_COOKIE['user_id'])) {
                $sql = "SELECT * FROM emagazine WHERE id = $id";
                $res = self::$conn->query($sql);
                $magazines = array();
                if ($res->num_rows > 0) {
                    $resp['magazine'] = $res->fetch_assoc();
                    $resp['status'] = true;
                } else {
                    $resp['status'] = false;
                }
            } else {
                $resp['status'] = false;
            }
            echo json_encode($resp);
        }
        
        public static function getUserEarning($id)
        {
            $sql = "SELECT * FROM referral_earnings WHERE user_id = $id";
            $res = self::$conn->query($sql);
            if ($res->num_rows > 0) {
                $resp['userEarning'] = $res->fetch_assoc();
                $resp['status'] = true;
            } else {
                $resp['status'] = false;
            }
            echo json_encode($resp);
        }
    }
} else {
    header('location: /');
}
