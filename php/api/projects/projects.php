<?php

    require_once("../../db-connect.php");
    class Project extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

        public  function getProjects($offset, $limit)
        {
            $sql = "SELECT * FROM projects WHERE project_approve = 1 ORDER BY project_id DESC LIMIT $limit OFFSET $offset ";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $arr = array();
                    while ($row = $res->fetch_assoc()) {
                        array_push($arr, $row);
                    }
                    $resp['status'] = true;
                    $resp['message'] = "Successfully fetched material";
                    $resp['data'] = $arr;
                    return json_encode($resp);
                }
            } else {
                $resp['status'] = false;
                $resp['error'] = "Somthing going wrong.";                ;
                return json_encode($resp);
            }
        }

    }
