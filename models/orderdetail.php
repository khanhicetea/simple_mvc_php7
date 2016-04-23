<?php

class Orderdetail extends Model {

    public $table = "orderdetails";
    public $primary_key = "";

    function insert($data) {
        return db_insert($this->table, $data);
    }

}
