<?php
require_once('db.php');

try {
    $db = new Db('sqlite:baug.sqlite3');

    if(!empty($_POST['regid']) && !empty($_POST['device_name'])){
        $devices = $db->getByRegid($_POST['regid']);
        if(count($devices) > 0){
            echo 'ok';
            exit();
            //throw new Exception('Already registered.');
        }
        $insert = "INSERT INTO Devices (regid, device_name) VALUES (:regid, :device_name)";
        $stmt = $db->prepare($insert);
        $stmt->bindParam(':regid', $_POST['regid']);
        $stmt->bindParam(':device_name', $_POST['device_name']);
        $stmt->execute();
        if($stmt->rowCount() != 1){
            throw new Exception('Unexpected error while inserting data.');
        }
        echo 'ok';
    }else{
        $devices = $db->query("SELECT * FROM Devices");
        throw new Exception('Missing parameters.');
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
}

