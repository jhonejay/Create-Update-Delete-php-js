<?php
    header('Access-Control-Allow-Origin: *');
    require_once("./testProject/includes/initialize.php");

     $firstname = $_REQUEST["firstname"]; // from vehicle_registration_form.html (ang ID niya)
    $middlename = $_REQUEST["middlename"];
    $lastname = $_REQUEST["lastname"];
    

    //$data_array = array(); 
    $var = new CrudInfo(); 
    $var->first_name = ''.$firstname.'';
    $var->middle_name = ''.$middlename.'';
    $var->last_name = ''.$lastname.'';
    


    $var->save();

    //$post_data = json_encode(array('item' => $post_data), JSON_FORCE_OBJECT);
    //array_push($data_array, $var);
    //header('Content-type: application/json');
    //echo json_encode($var);
    //echo json_last_error_msg();


?>

