<?php

namespace application\lib;

use PDO;

class Db
{

    protected $db;

    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . '', $config['user'], $config['password']);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach ($params as $key => $val){
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function insert($table, $data = []){
        $keys = array_keys($data);
        $sql = "INSERT INTO ".$table." ";
        if($data){
            $sql .= "(".implode(',', $keys).") VALUES (:".implode(',:', $keys).")";
        }
        return $this->db->prepare($sql)->execute($data);
    }

    public function update_by_id($table, $id, $data = []){
        $sql = 'UPDATE '.$table.' SET ';
        if($data){
            foreach ($data as $key => $val){
                $sql .= $key.' = "'.$val.'", ';
            }
            $sql = substr($sql,0,-2);
            $sql .= ' WHERE id = '.$id;
        }
        return $this->db->prepare($sql)->execute($data);
    }



}