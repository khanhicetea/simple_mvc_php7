<?php

class Product extends Model {

    public $table = "products";
    public $primary_key = "id";

    public function insertProduct($data) {
        return db_insert($this->table, $data);
    }

    public function updateProduct($data, $id) {
        return db_update($this->table, $data, "$this->primary_key = '$id'");
    }

    public function removeProduct($id) {
        return db_delete($this->table, "`{$this->primary_key}` = '$id'");
    }

    public function getAllProduct() {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC";
        return db_get_all($sql);
    }

    public function getProductWithPage($page, $per) {
        $start = ($page - 1) * $per;
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC LIMIT $start, $per";
        return db_get_all($sql);
    }
    
    public function getProductIndex() {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key} DESC LIMIT 0,4";
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

    public function getProductByID($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primary_key}='$id' ORDER BY {$this->primary_key} DESC";
        return db_get_all($sql);
    }

    public function getProductWHERE($where, $what = '*') {
        $sql = "SELECT {$what} FROM {$this->table} {$where} ORDER BY {$this->primary_key} DESC";
        return db_get_all($sql);
    }
    
    public  function getPage(){
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primary_key}";
        return count_row($sql);
    }

}
