<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    function get_base_url(){
        $url = "https://koreaversikamu.co.id/cms/";
        echo $url;
    }
    function get_base_url_noEcho(){
        $url = "http://koreaversikamu.co.id/cms/";
        return $url;
    }
    function get_category($faq_category){
        if(!isset($faq_category)){
            $faq_category = "default";
        }
        $url = get_base_url_noEcho();
        include $_SERVER['DOCUMENT_ROOT'].'/cms/controller/connectdb.php';
        
        $sql = "SELECT faq_category FROM `faq_table` GROUP BY faq_category";
        $query = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_array($query)){
            print_r($data['faq_category']);
            if($data['faq_category'] == $faq_category){
                echo "<option value=".urlencode($data['faq_category'])." selected>".$data['faq_category']."</option>";
            }else{
                echo "<option value=".urlencode($data['faq_category']).">".$data['faq_category']."</option>";
            }
        }
    }
    function get_post_faq($faq_id){
        $return_arr = array();
        
        $url = get_base_url_noEcho();
        include $_SERVER['DOCUMENT_ROOT'].'/cms/controller/connectdb.php';
        
        $sql = "SELECT * from `faq_table` WHERE faq_id = ".$faq_id;
        $query = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($query)){
            $row_array['id'] = $data['faq_id'];
            $row_array['faq_category'] = $data['faq_category'];
            $row_array['faq_question'] = $data['faq_question'];
            $row_array['faq_answers'] = $data['faq_answers'];

            array_push($return_arr,$row_array);
        }
        return $return_arr;
    }
    function get_post_popup($popup_id){
        $return_arr = array();
        
        $url = get_base_url_noEcho();
        include $_SERVER['DOCUMENT_ROOT'].'/cms/controller/connectdb.php';
        
        $sql = "SELECT * from `popup_table` WHERE popup_id = ".$popup_id;   
        $query = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($query)){
            $row_array['id'] = $data['popup_id'];
            $row_array['popup_title'] = $data['popup_title'];
            $row_array['popup_img'] = $data['popup_img'];
            $row_array['popup_answer'] = $data['popup_link'];
            $row_array['start_date'] = $data['start_date'];
            $row_array['end_date'] = $data['end_date'];

            array_push($return_arr,$row_array);
        }
        return $return_arr;
    }
    function get_post_promotion($popup_id){
        $return_arr = array();
        
        $url = get_base_url_noEcho();
        include $_SERVER['DOCUMENT_ROOT'].'/cms/controller/connectdb.php';
        
        $sql = "SELECT * from `promotion_table` WHERE popup_id = ".$popup_id;   
        $query = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($query)){
            $row_array['promotion_id'] = $data['promotion_id'];
            $row_array['promotion_title'] = $data['promotion_title'];
            $row_array['promotion_img'] = $data['promotion_img'];
            $row_array['promotion_info'] = $data['promotion_info'];
            $row_array['start_date'] = $data['start_date'];
            $row_array['end_date'] = $data['end_date']; 

            array_push($return_arr,$row_array);
        }
        return $return_arr;
    }
    
    function get_login($posting){
        $return_arr = array();
        
        $url = get_base_url_noEcho();
        include $_SERVER['DOCUMENT_ROOT'].'/cms/controller/connectdb.php';
        
        $sql = "SELECT * from `cms_user` WHERE user_email = '".$posting['logemail']."' AND user_password = '".$posting['logpass']."'";
        
        $query = mysqli_query($conn, $sql);
        if($query->num_rows > 1 || $query->num_rows < 1){
            return FALSE;
        }else if($query->num_rows == 1){
            while($data = mysqli_fetch_array($query)){
                print_r($data);
                $_SESSION['user_name'] = $data['user_name'];
                $_SESSION['user_email'] = $data['user_email'];
                return TRUE;
            }
        }
    }
?>