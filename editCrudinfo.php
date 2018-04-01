<?php
    header('Access-Control-Allow-Origin: *');
    require_once("./testProject/includes/initialize.php");

   $id = $_REQUEST["id"];
    $firstname = $_REQUEST["firstname"]; // from vehicle_registration_form.html (ang ID niya)
    $middlename = $_REQUEST["middlename"];
    $lastname = $_REQUEST["lastname"];
   

    //$data_array = array(); 
    $var = CrudInfo::find_by_id($id);
    $var->first_name = ''.$firstname.'';
    $var->middle_name = ''.$middlename.'';
    $var->last_name = ''.$lastname.'';
    
    $var->update();

    echo 'success';
    //$post_data = json_encode(array('item' => $post_data), JSON_FORCE_OBJECT);
    //array_push($data_array, $var);
    //header('Content-type: application/json');
    //echo json_encode($var);
    //echo json_last_error_msg();


?>

