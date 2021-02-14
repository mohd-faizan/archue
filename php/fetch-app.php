<?php
    session_start();
require_once("db-connect.php");
class FetchApp extends Conn
{
    private static $conn;
    public static function setConnect()
    {
        self::$conn = self::connect();
    }
    
    public static function fetchProject($offset, $limit)
    {
        $sql = "SELECT * FROM projects WHERE project_approve=1 ORDER BY project_date DESC,project_time DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from projects WHERE project_approve=1" ;

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                while ($row = $res->fetch_assoc()) {
                    // here we have tpo chwek the project with logged user if user logged in then chck whetjer this project is liked by the logged user if yes then send the like key to true other wise false
                    array_push($arr, $row);
                }
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                $resp['status'] = "yes";
                $resp['data'] = $arr;
                $resp['message'] = "Successfully fetched Project";
            } else {
                $resp['status'] = "no";
                $resp['data'] = "";
                $resp['message'] = "No project finds";
            }
        } else {
            $resp['status'] = "no";
            $resp['data'] = "";
            $resp['message'] = self::$conn->error;
        }
        echo json_encode($resp);
    }
    

    public static function getAllMaterials($offset, $limit, $post)
    {
        $category = $post['category'];
        $subcategory = $post['subcategory'];
        $sql = "SELECT * FROM material_upload WHERE category = '$category' AND sub_category = '$subcategory' LIMIT $limit OFFSET $offset" ;
        $sql1 = "SELECT count(*) as count from material_upload";

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    array_push($arr, $row);
                }
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                $resp['status'] = "yes";
                $resp['data'] = $arr;
                $resp['message'] = "Successfully fetched Project";
            } else {
                $resp['status'] = "no";
                $resp['data'] = "";
                $resp['message'] = "No project finds";
            }
        } else {
            $resp['status'] = "no";
            $resp['data'] = "";
            $resp['message'] = self::$conn->error;
        }
        echo json_encode($resp);
    }
    public static function getMaterial($post)
    {
        
        $materialID = $post['materialID'];
        $sql = "SELECT * FROM material_upload WHERE material_upload_id = $materialID";
        $sql1 = "SELECT count(*) as count from projects";

        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && material_upload_id = $materialID";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                $resp['status'] = "yes";
                $resp['data'] = $row;
                $resp['message'] = "Successfully fetched Project";
                
            } else {
                $resp['status'] = "no";
                $resp['data'] = "";
                $resp['message'] = "No project finds";
            }
        } else {
            $resp['status'] = "no";
            $resp['data'] = "";
            $resp['message'] = self::$conn->error;
        }
        echo json_encode($resp);
    }
    

    public static function fetchPortfolio($offset, $limit)
    {
        $sql = "SELECT * FROM portfolio WHERE portfolio_approve=1 ORDER BY portfolio_id DESC,portfolio_time DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from portfolio WHERE portfolio_approve=1";

        if ($result = self::$conn->query($sql)) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $userid = $row['user_id'];
                $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                if ($res = self::$conn->query($sql2)) {
                    $row = ($res->fetch_assoc())+$row;
                }
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['portfolio_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && portfolio_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['data'] = $arr;
            $resp['status'] = "yes";
        } else {
            $resp['data'] = "fetch portfolio query fail";
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchOnePortfolio($id) {
        $sql = "SELECT * FROM portfolio WHERE  portfolio_id=$id";

        if ($result = self::$conn->query($sql)) {
            $row = $result->fetch_assoc();
            $userid = $row['user_id'];
            $sql2 = "SELECT name FROM users WHERE user_id=$userid";
            if ($res = self::$conn->query($sql2)) {
                $row = ($res->fetch_assoc())+$row;
            }
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['portfolio_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && portfolio_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['data'] = $row;
            $resp['status'] = "yes";
        } else {
            $resp['data'] = "fetch portfolio query fail";
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchOneThesisReport($id) {
        $sql = "SELECT * FROM thesis_report WHERE  thesis_report_id=$id";

        if ($result = self::$conn->query($sql)) {
            $row = $result->fetch_assoc();
            $userid = $row['user_id'];
            $sql2 = "SELECT name FROM users WHERE user_id=$userid";
            if ($res = self::$conn->query($sql2)) {
                $row = ($res->fetch_assoc())+$row;
            }
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['thesis_report_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && thesis_report_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['data'] = $row;
            $resp['status'] = "yes";
        } else {
            $resp['data'] = "fetch thesis_report query fail";
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchDessertation($offset, $limit)
    {
        
        $sql = "SELECT * FROM dessertation WHERE dessertation_approve=1 ORDER BY dessertation_id DESC,dessertation_time DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from dessertation WHERE dessertation_approve=1";

        if ($result = self::$conn->query($sql)) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $userid = $row['user_id'];
                $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                if ($res = self::$conn->query($sql2)) {
                    $row = ($res->fetch_assoc())+$row;
                }
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['dessertation_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && dessertation_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['data'] = $arr;
            $resp['status'] = "yes";
        } else {
            $resp['data'] = "fetch desseratation query fail";
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchOneDessertation($id) {
        $sql = "SELECT * FROM dessertation WHERE dessertation_id=$id";

        if ($result = self::$conn->query($sql)) {
            $row = $result->fetch_assoc();
            $userid = $row['user_id'];
            $sql2 = "SELECT name FROM users WHERE user_id=$userid";
            if ($res = self::$conn->query($sql2)) {
                $row = ($res->fetch_assoc())+$row;
            }
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['dessertation_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && dessertation_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['data'] = $row;
            $resp['status'] = true;
        } else {
            $resp['data'] = "fetch desseratation query fail";
            $resp['status'] = false;
        }
        echo json_encode($resp);
    }

    public static function fetchStudentProject($offset, $limit)
    {
        $sql = "SELECT * FROM projects WHERE project_approve=1 AND user_id IN (SELECT user_id FROM users WHERE profession = 'Architecture Student') LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from projects WHERE project_approve=1 AND user_id IN (SELECT user_id FROM users WHERE profession = 'Architecture Student')";

        if ($result = self::$conn->query($sql)) {
            $arr = array();
            if ($result->num_rows>0) {
                while ($row=$result->fetch_assoc()) {
                    array_push($arr, $row);
                }
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                $resp['data'] = $arr;
                $resp['status'] = "yes";
            } else {
                $resp['status'] = "no";
                $resp['message'] = "No project found";
            }
        } else {
            $resp['status'] = "no";
            $resp['message'] = "Student project Query Error";
        }
        echo json_encode($resp);
    }
    

    public static function fetchThesisReport($offset, $limit)
    {
        $sql = "SELECT * FROM thesis_report WHERE thesis_report_approve=1 ORDER BY thesis_report_id DESC,thesis_report_time DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from thesis_report WHERE thesis_report_approve=1";
        if ($result = self::$conn->query($sql)) {
            $arr = array();
            if ($result->num_rows>0) {
                while ($row=$result->fetch_assoc()) {
                    $userid = $row['user_id'];
                    $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                    if ($res = self::$conn->query($sql2)) {
                        $row = ($res->fetch_assoc())+$row;
                    }
                    if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                        $id = $row['thesis_report_id'];
                        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                        $row['id'] = $userId;
                        $sql = "SELECT * FROM likes WHERE user_id = $userId && thesis_report_id = $id";
                        
                        if ($res1 = self::$conn->query($sql)) {
                            if ($res1->num_rows > 0) {
                                $row['like'] = true;
                            } else {
                                $row['like'] = false;
                            }
                        } else {
                            $row['like'] = false;
                            $row['message'] = self::$conn->error;
                        } 
                    } else {
                        $row['like'] = false;
                    }
                    array_push($arr, $row);
                }
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                $resp['data'] = $arr;
                $resp['status'] = "yes";
            } else {
                $resp['status'] = "no";
                $resp['message'] = "No project found";
            }
        } else {
            $resp['status'] = "no";
            $resp['message'] = "Student project Query Error";
        }
        echo json_encode($resp);
    }
    

    public static function similarThesisReport($post)
    {
        $id = $post['id'];
        $sql = "SELECT * FROM thesis_report WHERE thesis_report_approve=1 AND thesis_report_id != $id";
        if ($result=self::$conn->query($sql)) {
            $arr = array();
            while ($row=$result->fetch_assoc()) {
                $userid = $row['user_id'];
                $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                if ($res = self::$conn->query($sql2)) {
                    $row = ($res->fetch_assoc())+$row;
                }
                array_push($arr, $row);
            }
            $resp['data'] = $arr;
            $resp['status'] = "yes";
            echo json_encode($resp);
        } else {
            echo json_encode("error in similar thesis report");
        }
    }
    

    public static function fetchSimilarPort($ide)
    {
        $id = $ide;
        $sql = "SELECT * FROM portfolio WHERE portfolio_approve=1 AND  portfolio_id != $id";
        if ($result=self::$conn->query($sql)) {
            $arr = array();
            while ($row=$result->fetch_assoc()) {
                $userid = $row['user_id'];
                $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                if ($res = self::$conn->query($sql2)) {
                    $row = ($res->fetch_assoc())+$row;
                }
                array_push($arr, $row);
            }
            $resp['data'] = $arr;
            $resp['status'] = "yes";
            echo json_encode($resp);
        } else {
            echo json_encode("error in similar portfolio");
        }
    }
    

    public static function fetchSimiDesser($post)
    {
        $id = $post['id'];
        $sql = "SELECT * FROM dessertation WHERE dessertation_approve=1 AND dessertation_id != $id";
        if ($result=self::$conn->query($sql)) {
            $arr = array();
            while ($row=$result->fetch_assoc()) {
                $userid = $row['user_id'];
                $sql2 = "SELECT name FROM users WHERE user_id=$userid";
                if ($res = self::$conn->query($sql2)) {
                    $row = ($res->fetch_assoc())+$row;
                }
                array_push($arr, $row);
            }
            $resp['data'] = $arr;
            $resp['status'] = "yes";
            echo json_encode($resp);
        } else {
            echo json_encode("error in similar dessertation");
        }
    }
    

    public static function fetchBlog($offset, $limit)
    {
        $sql = "SELECT * FROM blog WHERE is_approve = 1 ORDER BY blog_id DESC,blog_date DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from blog WHERE is_approve=1" ;

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['blog_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && blog_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['resp'] = $arr;
            $resp['status'] = "yes";
        } else {
            $resp['resp'] = "Query Error";
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchOneBlog($id) {
        $sql = "SELECT * FROM blog WHERE blog_id=$id";

        if ($res = self::$conn->query($sql)) {
            $row = $res->fetch_assoc();
            $user_sql = "SELECT name FROM users WHERE user_id = $row[user_id]";
            if ($user_res = self::$conn->query($user_sql)){
                $row['user_name'] = $user_res->fetch_assoc()['name'];
            }
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['blog_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && blog_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['data'] = $row;
            $resp['status'] = true;
        } else {
            $resp['resp'] = "Query Error";
            $resp['status'] = false;
        }
        echo json_encode($resp);
    }
    public static function fetchSimilarBlogs($id)
    {
        $blogsArr = array();
        $sql = "SELECT * FROM blog WHERE category = (SELECT category FROM blog WHERE blog_id = $id) AND blog_id != $id ORDER BY blog_id DESC LIMIT 5";
        if($res = self::$conn->query($sql)) {
            if($res->num_rows > 0 ) {
                while($row = $res->fetch_assoc()) {
                    array_push($blogsArr, $row);
                }
                $resp['status'] = 'ok';
                $resp['data'] = $blogsArr;
            }else {
                $resp['status'] = 'no';
            }
        }else {
            $resp['status'] = 'no';
        }
        echo json_encode($resp);
    }

    public static function submitCommentBlog($post)
    {
        $name = $post['name'];
        $comment = $post['comment'];
        $blog_id = $post['blog_id'];
        $sql = "INSERT INTO blogcomments(commented_by, comment, commented_on, commented_at, is_approved, blog_id) values('$name', '$comment', CONVERT_TZ(NOW(),'+00:00', '+05:30'), CONVERT_TZ(NOW(),'+00:00', '+05:30'), 0, $blog_id)";
        if (self::$conn->query($sql)) {
            $resp['status'] = "yes";
        } else {
            $resp['status'] = "no";
        }
        echo json_encode($resp);
    }
    public static function fetchCommentsOfBlog($id)
    {
        $commentsArr = [];
        $sql = "SELECT * FROM blogcomments WHERE blog_id = $id AND is_approved = 1 ORDER BY id DESC";
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    array_push($commentsArr, $row);
                }
                $resp['data'] = $commentsArr;
                $resp['status'] = 'Ok';
            } else {
                $resp['status'] = "No";
            }
        } else {
            $resp['status'] = 'No';
        }
        echo json_encode($resp);
    }

    public static function fetchThesis($offset, $limit)
    {
        $sql = "SELECT * FROM thesis WHERE thesis_approve=1 ORDER BY thesis_id DESC,thesis_date DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from thesis WHERE thesis_approve=1";

        $arr = array();
        if ($res=self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['data'] = $arr;
            echo json_encode($resp);
        } else {
            echo json_encode("Not running thesis query");
        }
    }
    public static function fetchOneThesis($id) {
        $sql = "SELECT * FROM thesis WHERE  thesis_id=$id ";
        if ($res=self::$conn->query($sql)) {
            $row = $res->fetch_assoc();
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $thesisId = $id;
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && thesis_id = $thesisId";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['data'] = $row;
            $resp['status'] = true;
            echo json_encode($resp);
        } else {
            echo json_encode("Not running thesis query");
        }
    }

    public static function fetchEvents($offset, $limit)
    {
        $sql = "SELECT * FROM events WHERE is_approve = 1 ORDER BY event_id DESC,event_date DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from events WHERE is_approve=1" ;

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['event_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && event_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['status'] = "yes";
            $resp['data'] = $arr;
        } else {
            $resp['status'] = "no";
            $resp['data'] = "query error";
        }
        echo json_encode($resp);
    }
    public static function fetchOneEvent($id) {
        $sql = "SELECT * FROM events WHERE  event_id=$id";

        if ($res = self::$conn->query($sql)) {
            $row = $res->fetch_assoc();
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['event_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && event_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['status'] = "yes";
            $resp['data'] = $row;
        } else {
            $resp['status'] = "no";
            $resp['data'] = "query error";
        }
        echo json_encode($resp);  
    }
    

    public static function fetchJob($offset, $limit)
    {
        $sql = "SELECT * FROM jobs WHERE is_approve = 1 ORDER BY job_id DESC,job_date DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from jobs WHERE is_approve=1" ;

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['job_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && job_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['status'] = "yes";
            $resp['data'] = $arr;
        } else {
            $resp['status'] = "no";
            $resp['data'] = "query error";
        }
        echo json_encode($resp);
    }
    public static function fetchOneJob($id) {
        $sql = "SELECT * FROM jobs WHERE  job_id = $id";

        if ($res = self::$conn->query($sql)) {
            $row = $res->fetch_assoc();
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $id = $row['job_id'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && job_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['status'] = "yes";
            $resp['data'] = $row;
        } else {
            $resp['status'] = "no";
            $resp['data'] = "query error";
        }
        echo json_encode($resp);
    }

    public static function fetchCompetitor($offset, $limit)
    {
        $sql = "SELECT * FROM competition WHERE is_approve = 1 ORDER BY competitor_id DESC,competitor_date DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from competition WHERE is_approve=1" ;

        $arr = array();
        if ($res = self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $id = $row['competitor_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && competitor_id = $id";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                array_push($arr, $row);
            }
            $res1 = self::$conn->query($sql1);
            $count = $res1->fetch_assoc()['count'];
            $resp['count'] = $count;
            $resp['status'] = "yes";
            $resp['data'] = $arr;
        } else {
            $resp['status'] = "no";
            $resp['data'] = self::$conn->error;
        }
        echo json_encode($resp);
    }
    public static function fetchOneCompetitor($id) {
        $sql = "SELECT * FROM competition WHERE competitor_id=$id";

        if ($res = self::$conn->query($sql)) {
            $row = $res->fetch_assoc();
            if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                $row['id'] = $userId;
                $sql = "SELECT * FROM likes WHERE user_id = $userId && competitor_id = $id";
                
                if ($res1 = self::$conn->query($sql)) {
                    if ($res1->num_rows > 0) {
                        $row['like'] = true;
                    } else {
                        $row['like'] = false;
                    }
                } else {
                    $row['like'] = false;
                    $row['message'] = self::$conn->error;
                } 
            } else {
                $row['like'] = false;
            }
            $resp['status'] = "yes";
            $resp['data'] = $row;
        } else {
            $resp['status'] = "no";
            $resp['data'] = self::$conn->error;
        }
        echo json_encode($resp); 
    }

    public static function getMaterialUpload()
    {
        $sql = "SELECT * FROM material_upload ORDER BY material_upload_id DESC";
        $arr = array();
        if ($res = self::$conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                array_push($arr, $row);
            }
            $resp['data'] = $arr;
            $resp['status'] = "yes";
        } else {
            $resp['status'] = "no";
            $resp['data'] = "query error";
        }
        echo json_encode($resp);
    }
    public static function increaseViewMaterial($id) {
        $sql = "UPDATE material_upload SET views = views + 1 WHERE material_upload_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseViewsJob($id) {
        $sql = "UPDATE jobs SET views = views + 1 WHERE job_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseViewsEvent($id) {
        $sql = "UPDATE events SET views = views + 1 WHERE event_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseViewsCompetition($id) {
        $sql = "UPDATE competition SET views = views + 1 WHERE competitor_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseViewsBlog($id) {
        $sql = "UPDATE blog SET views = views + 1 WHERE blog_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaselikesCompetition($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && competitor_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE competition SET likes = likes-1 WHERE competitor_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && competitor_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(competitor_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE competition SET likes = likes + 1 WHERE competitor_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        } 
    }
    public static function increaselikesJob($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && job_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE jobs SET likes = likes-1 WHERE job_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && job_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(job_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE jobs SET likes = likes + 1 WHERE job_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }  
    }  
    public static function increaselikesEvent($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && event_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE events SET likes = likes-1 WHERE event_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && event_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(event_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE events SET likes = likes + 1 WHERE event_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        } 
    }
    public static function increaselikesBlog($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && blog_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE blog SET likes = likes-1 WHERE blog_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && blog_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(blog_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE blog SET likes = likes + 1 WHERE blog_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }
    }
    public static function increaseViewsThesisReport($id) {
        $sql = "UPDATE thesis_report SET views = views + 1 WHERE thesis_report_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        } 
    }
    public static function increaseViewsDessertation($id) {
        $sql = "UPDATE dessertation SET views = views + 1 WHERE dessertation_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseViewsPortfolio($id) {
        $sql = "UPDATE portfolio SET views = views + 1 WHERE portfolio_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function increaseLikeMaterial($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && material_upload_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE material_upload SET likes = likes-1 WHERE material_upload_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && material_upload_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(material_upload_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE material_upload SET likes = likes + 1 WHERE material_upload_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }
    }
    public static function increaselikesThesisReport($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && thesis_report_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE thesis_report SET likes = likes-1 WHERE thesis_report_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && thesis_report_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(thesis_report_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE thesis_report SET likes = likes + 1 WHERE thesis_report_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }
    }
    public static function increaselikesDessertation($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && dessertation_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE dessertation SET likes = likes-1 WHERE dessertation_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && dessertation_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(dessertation_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE dessertation SET likes = likes + 1 WHERE dessertation_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }
    }
    public static function increaselikesPortfolio($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && portfolio_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE portfolio SET likes = likes-1 WHERE portfolio_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && portfolio_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(portfolio_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE portfolio SET likes = likes + 1 WHERE portfolio_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error check likes table".self::$conn->error;
            }

        }
    }
    public static function increaseLikeThesis($id) {
        session_start();
        if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
            $userId = isset($_SESSION['user_id']) ?  $_SESSION['user_id'] : $_COOKIE['user_id'];
            $sql = "SELECT * FROM likes WHERE user_id = $userId && thesis_id = $id";
            if($res = self::$conn->query($sql)) {
                if ($res->num_rows > 0) {
                    $sql1 = "UPDATE thesis SET likes = likes-1 WHERE thesis_id = $id";
                    if (self::$conn->query($sql1)) {
                        $sql2 = "DELETE FROM likes WHERE user_id=$userId && thesis_id=$id";
                        if (self::$conn->query($sql2)) {
                            echo 'successfully decrement';
                        } else {
                            echo 'error in delete row from likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in decremnt likes'.self::$conn->error;;
                    }
                } else {
                    
                    $sql3 = "INSERT INTO likes(thesis_id, user_id) VALUES($id, $userId)";
                    if (self::$conn->query($sql3)) {
                        $sql4 = "UPDATE thesis SET likes = likes + 1 WHERE thesis_id = $id";
                        if (self::$conn->query($sql4)) {
                            echo 'succesfully';
                        } else {
                            echo 'error in incrment likes'.self::$conn->error;
                        }
                    } else {
                        echo 'error in insert likes'.self::$conn->error;
                    }

                }
            } else {
                echo "error".self::$conn->error;
            }

        }
    }
    public static function increaseViewThesis($id){
        $sql = "UPDATE thesis SET views = views + 1 WHERE thesis_id = $id";
        if (self::$conn->query($sql)) {
            echo 'successfully incremented';
        } else {
            echo "Eror ".self::$conn->error;
        }
    }
    public static function getMatProducts($offset, $limit, $cat)
    {
        $sql = "SELECT * FROM material_upload WHERE category = '$cat' ORDER BY material_upload_id DESC LIMIT $limit OFFSET $offset";
        $sql1 = "SELECT count(*) as count from material_upload";

        if ($res = self::$conn->query($sql)) {
            $arr = array();
            if ($res->num_rows>0) {
                while ($row = $res->fetch_assoc()) {
                    array_push($arr, $row);
                }
                $res1 = self::$conn->query($sql1);
                $count = $res1->fetch_assoc()['count'];
                $resp['count'] = $count;
                $resp['data'] = $arr;
                $resp['status'] = 1;
            } else {
                $resp['data'] = "NO Rows";
                $resp['status'] = 2;
            }
        } else {
            $resp['data'] = self::$conn->error;
            $resp['status'] = 2;
        }
        echo json_encode($resp);
    }
    public static function getSimilarMaterial($get)
    {
        $sql = "SELECT * FROM material_upload WHERE sub_category like '$get[key]' AND material_upload_id != '$get[id]'";
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                $arr = array();
                while ($row = $res->fetch_assoc()) {
                    array_push($arr, $row);
                }
                $resp['data'] = $arr;
                $resp['status'] = 1;
            } else {
                $resp['data'] = "No Rows";
                $resp['status'] = 2;
            }
        } else {
            $resp['data'] = self::$conn->error;
            $resp['status'] = 2;
        }
        echo json_encode($resp);
    }
    public static function getNextPrevPro($get)
    {
        // echo json_encode($_GET);
        if ($get['isNext']=="true") {
            $sql = "SELECT project_id,view3d_img,project_name FROM projects WHERE project_id>$get[id] AND project_approve=1 LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        } else {
            $sql = "SELECT project_id,view3d_img,project_name FROM projects WHERE project_id<$get[id] AND project_approve=1 ORDER BY project_id DESC LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        }
    }
    // fetch similar projects
    public static function fetchSimilarProject($get)
    {
        // echo json_encode($get);
        $arr = array();
        $project_type = self::$conn->real_escape_string($get['project_type']);
        $sql = "SELECT * FROM projects WHERE project_id != $get[project_id] AND project_type = '$project_type' ORDER BY project_id LIMIT 3";
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    array_push($arr, $row);
                }
                echo json_encode(array("data"=>$arr,"status"=>"ok"));
            } else {
                echo json_encode(array("data"=>"No rows Found","status"=>"no"));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>"no"));
        }
    }
    public static function fetchSingleProject($id) {
        $sql = "SELECT * FROM projects WHERE project_id = $id";
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows) {
                $row = $res->fetch_assoc();
                $user_sql = "SELECT name, username FROM users WHERE user_id = $row[user_id]";
                if ($user_res = self::$conn->query($user_sql)){
                    $myUserRow = $user_res->fetch_assoc();
                    $row['user_name'] = $myUserRow['name'];
                    $row['username'] = $myUserRow['username'];
                }
                if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])) {
                    $projectid = $row['project_id'];
                    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
                    $row['id'] = $userId;
                    $sql = "SELECT * FROM likes WHERE user_id = $userId && project_id = $projectid";
                    
                    if ($res1 = self::$conn->query($sql)) {
                        if ($res1->num_rows > 0) {
                            $row['like'] = true;
                        } else {
                            $row['like'] = false;
                        }
                    } else {
                        $row['like'] = false;
                        $row['message'] = self::$conn->error;
                    } 
                } else {
                    $row['like'] = false;
                }
                echo json_encode(array("data"=>$row,"status"=>true));
            } else {
                echo json_encode(array("data"=>"No rows Found","status"=>false));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>false));
        }
    }

    public static function getSimilarThesis($get){
        $arr = array();
        $thesis_type = self::$conn->real_escape_string($get['thesis_type']);
        $sql = "SELECT thesis_id,thesis_title,casestudy FROM thesis WHERE thesis_id != $get[thesis_id] AND thesis_proj_type = '$thesis_type' ORDER BY thesis_id LIMIT 3";
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows) {
                while ($row = $res->fetch_assoc()) {
                    array_push($arr, $row);
                }
                echo json_encode(array("data"=>$arr,"status"=>"ok"));
            } else {
                echo json_encode(array("data"=>"No rows Found","status"=>"no"));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>"no"));
        }
    }
    public static function getNextPrevThesis($get){
        if ($get['isNext']=="true") {
            $sql = "SELECT thesis_id,casestudy,thesis_title FROM thesis WHERE thesis_id>$get[id] LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        } else {
            $sql = "SELECT thesis_id,casestudy,thesis_title FROM thesis WHERE thesis_id<$get[id] ORDER BY thesis_id DESC LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        }
    }
    public static function getNextPrevBlog($get){
        if ($get['isNext']=="true") {
            $sql = "SELECT blog_id,blog_file,heading FROM blog WHERE blog_id>$get[id] AND is_approve=1 LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        } else {
            $sql = "SELECT blog_id,blog_file,heading FROM blog WHERE blog_id<$get[id] AND is_approve=1 ORDER BY blog_id DESC LIMIT 1";
            if ($res = self::$conn->query($sql)) {
                if ($res->num_rows>0) {
                    $row = $res->fetch_assoc();
                    echo json_encode(array("data"=>$row,"status"=>true));
                } else {
                    echo json_encode(array("data"=>"no rows","status"=>false));
                }
            } else {
                echo json_encode(array("data"=>self::$conn->error,"status"=>false));
            }
        }
    }

    public static function getNextPrevMaterial($get){
        if($get['isNext']=="true"){
            $sql = "SELECT * FROM material_upload WHERE material_upload_id>$get[materialId] LIMIT 1";
        }
        else{
            $sql = "SELECT * FROM material_upload WHERE material_upload_id<$get[materialId] ORDER BY material_upload_id DESC LIMIT 1";
        }
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                $row = $res->fetch_assoc();
                echo json_encode(array("data"=>$row,"status"=>true));
            } else {
                echo json_encode(array("data"=>"no rows","status"=>false));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>false));
        }
    }

    public static function getNextPrevEvent($get){
        if($get['isNext']=="true"){
            $sql = "SELECT * FROM events WHERE event_id>$get[event_id] AND is_approve=1 LIMIT 1";
        }
        else{
            $sql = "SELECT * FROM events WHERE event_id<$get[event_id] AND is_approve=1 ORDER BY event_id DESC LIMIT 1";
        }
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                $row = $res->fetch_assoc();
                echo json_encode(array("data"=>$row,"status"=>true));
            } else {
                echo json_encode(array("data"=>"no rows","status"=>false));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>false));
        }
    }
    public static function getNextPrevJob($get){
        if($get['isNext']=="true"){
            $sql = "SELECT * FROM jobs WHERE job_id>$get[job_id] AND is_approve=1 LIMIT 1";
        }
        else{
            $sql = "SELECT * FROM jobs WHERE job_id<$get[job_id] AND is_approve=1 ORDER BY job_id DESC LIMIT 1";
        }
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                $row = $res->fetch_assoc();
                echo json_encode(array("data"=>$row,"status"=>true));
            } else {
                echo json_encode(array("data"=>"no rows","status"=>false));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>false));
        }
    }
    public static function getNextPrevComp($get){
        if($get['isNext']=="true"){
            $sql = "SELECT * FROM competition WHERE competitor_id>$get[comp_id] AND is_approve=1 LIMIT 1";
        }
        else{
            $sql = "SELECT * FROM competition WHERE competitor_id<$get[comp_id] AND is_approve=1 ORDER BY competitor_id DESC LIMIT 1";
        }
        if ($res = self::$conn->query($sql)) {
            if ($res->num_rows>0) {
                $row = $res->fetch_assoc();
                echo json_encode(array("data"=>$row,"status"=>true));
            } else {
                echo json_encode(array("data"=>"no rows","status"=>false));
            }
        } else {
            echo json_encode(array("data"=>self::$conn->error,"status"=>false));
        } 
    } 
}
FetchApp::setConnect();
