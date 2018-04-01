<?php
    header('Access-Control-Allow-Origin: *');
    require_once("./testProject/includes/initialize.php");
    
        $id = $_REQUEST["id"];
        //$data_array = array(); 
        $var = CrudInfo::find_by_id($id);
        echo '{"crudInfo":'.json_encode($var).'}';
        //$post_data = json_encode(array('item' => $post_data), JSON_FORCE_OBJECT);
        //array_push($data_array, $var);
        //header('Content-type: application/json');
        //echo json_encode($var);
        //echo json_last_error_msg();
?>

