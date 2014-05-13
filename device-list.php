<?php

require 'db.php';

$db      = new Db('sqlite:baug.sqlite3');
$devices = $db->getDevices();

foreach ($devices as $device) {
    printf('<li><input type="checkbox" name="direct_to" value="%s" /> %s</li>', $device['id'], $device['device_name']);
}
