<?php

$host = '127.0.0.1';
$user = 'root';
$password = '1234';
$db_name = 'moneylover';

mysql_connect($host, $user, $password, $db_name) or die('Can not connect database !');
mysql_select_db($db_name);
mysql_set_charset('utf8');

function esc($text) {
    return mysql_real_escape_string($text);
}

function db_get_all($sql) {
    $result = mysql_query($sql);
    $data = array();

    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

function count_row($sql){
    $result = mysql_query($sql);
    return mysql_num_rows($result);
}

function db_insert($table, $data, $tf = FALSE) {
    $fields = array_keys($data);
    $e_data = array_map('mysql_real_escape_string', $data);

    $sql = "INSERT INTO `{$table}` (`" . implode('`, `', $fields) . "`) VALUES ('" . implode("', '", $e_data) . "')";

    if ($tf) {
        mysql_query($sql);
        $inserted_id = mysql_insert_id();
        return $inserted_id;
    }

    return mysql_query($sql);

    //$inserted_id = mysql_insert_id();
    //return $inserted_id;
}

function db_update($table, $data, $where, $tf = FALSE) {
    $fields = array_keys($data);
    $e_data = array_map('mysql_real_escape_string', $data);
    $sets = array();

    foreach ($fields as $field) {
        $sets[] = "`{$field}` = '{$e_data[$field]}'";
    }
    $sql = "UPDATE `{$table}` SET " . implode(', ', $sets) . " WHERE {$where}";

    if ($tf) {
        mysql_query($sql);
        return mysql_affected_rows();
    }
    return mysql_query($sql);
}

function db_delete($table, $where) {
    $sql = "DELETE FROM `{$table}` WHERE {$where}";
    return mysql_query($sql);

//    return mysql_affected_rows();
}
