<?php
	header('Access-Control-Allow-Origin: *');
    require_once("./testProject/includes/initialize.php");
    

        $data_array = array(); 
        $var = CrudInfo::find_all();
        echo '{"crudInfo":'.json_encode($var).'}';
        //$post_data = json_encode(array('item' => $post_data), JSON_FORCE_OBJECT);
        //array_push($data_array, $var);
        //header('Content-type: application/json');
        //echo json_encode($var);
        //echo json_last_error_msg();
?>

