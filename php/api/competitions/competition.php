<?php

    require_once("../../db-connect.php");
    class Competition extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

        public  function getCompetition($offset, $limit)
        {
            $sql = "SELECT * FROM competition WHERE is_approve=1 ORDER BY competitor_id DESC LIMIT $limit OFFSET $offset";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $arr = array();
                    while ($row = $res->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    $resp['status'] = true;
                    $resp['message'] = "Successfully fetched Compettions";
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
