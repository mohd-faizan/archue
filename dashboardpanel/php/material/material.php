<?php

    require_once("../db-connect.php");
    class Material extends Conn
    {
        private static $conn;
        function __construct()
        {
            self::$conn = self::connect();
        }

       
        public function getMaterialCategory() {
            $sql = "SELECT * FROM material_category WHERE parent_id=0";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $arr = array();
                    while ($row = $res->fetch_assoc()) {
                        $sql1 = "SELECT * FROM material_category WHERE parent_id=$row[id]";
                        $res1 = self::$conn->query($sql1);
                        $row['subCategory'] = array();
                        while($row1 = $res1->fetch_assoc()) {
                            array_push($row['subCategory'], $row1);
                        }
                        array_push($arr, $row);
                    }
                    $resp['status'] = true;
                    $resp['message'] = "Successfully fetched material categories";
                    $resp['data'] = $arr;
                    return json_encode($resp);
                }
            } else {
                $resp['status'] = false;                ;
                $resp['error'] = "something going wrong.";                ;
                return json_encode($resp);
            }            
        }

        public function createMaterialCategory($post, $update=false, $id='') {
            if ($update) {
                $sql = "UPDATE material_category SET title='$post[category]' WHERE id=$id";
            } else {
                $sql = "INSERT INTO material_category(parent_id, title) VALUES(0,'$post[category]')";
            }
            if ($res = self::$conn->query($sql)) {
                if ($update) {
                    $last_id = $id;    
                } else {
                    $last_id = self::$conn->insert_id;
                }
                $subCategories = explode(",",$post['subCategory']);
                foreach ($subCategories as $value) {
                    $sql1 = "INSERT INTO material_category(parent_id, title) VALUES($last_id,'$value')";
                    if ($res1 = self::$conn->query($sql1)) {
                        $resp['status'] = true;
                        $resp['message'] = "Successfully inserted data";
                        $resp['data'] = null;
                    } else {
                        $resp['status'] = false;
                        $resp['message'] = self::$conn->error;
                        $resp['data'] = null;
                    }
                }
            }else {
                $resp['status'] = false;
                $resp['message'] = self::$conn->error;
                $resp['data'] = null;
            }
            return json_encode($resp);
        }

        public function deleteMaterialCategory($id) {
            $sql = "DELETE FROM material_category WHERE parent_id=$id";
            if ($res = self::$conn->query($sql)) {
                $sql1 = "DELETE FROM material_category WHERE id=$id";
                if ($res1 = self::$conn->query($sql1)) {
                    $resp['status'] = true;
                    $resp['message'] = "Succesfully deleted";
                } else {
                    $resp['status'] = false;
                    $resp['message'] = self::$conn->error;
                } 
            } else {
                $resp['status'] = false;
                $resp['message'] = self::$conn->error;
            }
            return json_encode($resp);
        }

        public function updateMaterialCategory($id, $post) {
            $sql = "DELETE FROM material_category WHERE parent_id=$id";
            if ($res = self::$conn->query($sql)) {
                return $this->createMaterialCategory($post, true, $id);
            } else {
                $resp['status'] = false;
                $resp['message'] = self::$conn->error;
                $resp['data'] = null;
                return json_encode($resp);
            }
        }

    }
