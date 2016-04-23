<?php

class Post extends Model {

    public $table = "posts";
    public $primary_key = "id";

    public function insertPost($data) {
        return db_insert($this->table, $data);
    }

    public function updatePost($data, $id) {
        return db_update($this->table, $data, "$this->primary_key = '$id'");
    }

    public function removePost($id) {
        return db_delete($this->table, "`{$this->primary_key}` = '$id'");
    }

    public function getAllPost() {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC";
        return db_get_all($sql);
    }

    public function getPostIndex() {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC LIMIT 0,6";
        return db_get_all($sql);
    }

    public function setImageName($type, $filename) {
        $name = md5_file($filename);
        if ($type == "image/jpeg") {
            return $name . '.jpg';
        }
        if ($type == "image/png") {
            return $name . '.png';
        }
        if ($type == "image/gif") {
            return $name . ".gif";
        }
    }

    public function getPostByID($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primary_key}='$id'";
        return db_get_all($sql);
    }

    public function getPostWHERE($where, $what = '*') {
        $sql = "SELECT {$what} FROM {$this->table} {$where} ORDER BY {$this->primary_key} DESC";
        return db_get_all($sql);
    }

    public function getPostWithPage($page, $per) {
        $start = ($page - 1) * $per;
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC LIMIT $start, $per";
        return db_get_all($sql);
    }
    
    public  function getPage(){
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key}";
        return count_row($sql);
    }

}
