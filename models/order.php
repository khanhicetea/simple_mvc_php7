<?php

class Order extends Model {

    public $table = "orders";
    public $primary_key = "id";

    function insert($data) {
        return db_insert($this->table, $data, TRUE);
    }

}
