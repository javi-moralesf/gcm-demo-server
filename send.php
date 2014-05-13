<?php
require_once('db.php');

try {
    if(empty($_POST)){
        throw new Exception("Invalid request method");
    }

    $db = new Db('sqlite:baug.sqlite3');

    $notification_devices = empty($_POST['devices']) ? array() : $_POST['devices'];
    $notification_send_type = empty($_POST['send_type']) ? 'broadcast' : $_POST['send_type'];
    switch($notification_send_type){
        case 'direct':
            $devices = $db->getById($notification_devices);
            break;
        default:
            $devices = $db->getDevices();
            break;
    }

    $send = new StdClass();
    $send->registration_ids = array();
    foreach($devices as $device){
        if(!empty($device['regid']) && !in_array($device['regid'], $send->registration_ids)){
            $send->registration_ids[] = $device['regid'];
        }
    }
    
    $send->data = new StdClass();
    $send->data->title = empty($_POST['title']) ? 'Welcome BAUG!' : $_POST['title'];
    $send->data->message = empty($_POST['msg']) ? 'Provided by Focus On Emotions' : $_POST['msg'];
    $send->data->hidden = $_POST['hidden'];
    $send->data->icon = $_POST['icon'];
    $send->data->audio = $_POST['sound'];

    $send->data->action = 'test1';
    $json_data = json_encode($send);

    $url = "http://android.googleapis.com/gcm/send";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:key=YOUR-GCM-PROJECT-AUTH-TOKEN-HERE',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 15000);
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    $error = curl_error($ch);
    curl_close($ch);

    print_r($result);
    print_r($info);
    print_r($error);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

