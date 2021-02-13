<?php

    require_once("../../db-connect.php");
    class Lead extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

        public  function getLeads($offset, $limit)
        {
            $sql = "SELECT * FROM leads ORDER BY lead_id DESC LIMIT $limit OFFSET $offset";
            $sql1 = "SELECT count(*) as count from leads";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $arr = array();
                    while ($row = $res->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    $res1 = self::$conn->query($sql1);
                    $count = $res1->fetch_assoc()['count'];
                    $resp['count'] = $count;
                    $resp['status'] = true;
                    $resp['message'] = "Successfully fetched leads";
                    $resp['data'] = $arr;
                    return json_encode($resp);
                }
            } else {
                $resp['status'] = false;                ;
                $resp['error'] = "something going wrong.";                ;
                return json_encode($resp);
            }
        }

    }
