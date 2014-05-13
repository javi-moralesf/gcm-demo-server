<?php
require_once('db.php');

try {
    $db = new Db('sqlite:baug.sqlite3');
	$db->clear();
}
catch(PDOException $e) {
    echo $e->getMessage();
}

