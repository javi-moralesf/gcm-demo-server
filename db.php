<?php

class Db extends PDO{

    public function __construct($dsn, $username = null, $password = null, $options = null){
        parent::__construct($dsn, $username, $password, $options);
        $this->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        $this->init();
    }

    private function init(){
        $this->exec("CREATE TABLE IF NOT EXISTS Devices (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    regid TEXT,
                    device_name TEXT)");
    }

    public function getById($ids){
        if(!is_array($ids)){
            $ids = array($ids);
        }
        $qMarks = str_repeat('?,', count($ids) - 1) . '?';
        $select = $this->prepare("SELECT * FROM Devices WHERE id IN ($qMarks)");
        $select->execute($ids);
        return $select->fetchAll();
    }

    public function getByRegid($regids){
        if(!is_array($regids)){
            $regids = array($regids);
        }
        $qMarks = str_repeat('?,', count($regids) - 1) . '?';
        $select = $this->prepare("SELECT * FROM Devices WHERE regid IN ($qMarks)");
        $select->execute($regids);
        return $select->fetchAll();
    }

    public function getDevices(){
        $select = $this->query("SELECT * FROM Devices");
        return $select->fetchAll();
    }
}