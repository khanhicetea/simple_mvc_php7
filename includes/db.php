<?php

$host = '127.0.0.1';
$user = 'root';
$password = 'passwd';
$db_name = 'simple_mvc';

$conn = mysqli_connect($host, $user, $password, $db_name) or die('Can not connect database !');
mysqli_select_db($conn, $db_name);
mysqli_set_charset($conn, 'utf8');

function esc($text) {
    global $conn;
    return mysqli_real_escape_string($conn, $text);
}

function db_query($sql) {
    global $conn;
    return mysqli_query($conn, $sql);
}

function db_get_all($sql) {
    $result = db_query($sql);
    $data = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

function count_row($sql){
    $result = db_query($sql);
    return mysqli_num_rows($result);
}

function db_insert($table, $data, $tf = FALSE) {
    $fields = array_keys($data);
    $e_data = array_map('mysqli_real_escape_string', $data);

    $sql = "INSERT INTO `{$table}` (`" . implode('`, `', $fields) . "`) VALUES ('" . implode("', '", $e_data) . "')";

    if ($tf) {
        db_query($sql);
        global $conn;
        $inserted_id = mysqli_insert_id($conn);
        return $inserted_id;
    }

    return db_query($sql);
}

function db_update($table, $data, $where, $tf = FALSE) {
    $fields = array_keys($data);
    $e_data = array_map('esc', $data);
    $sets = array();

    foreach ($fields as $field) {
        $sets[] = "`{$field}` = '{$e_data[$field]}'";
    }
    $sql = "UPDATE `{$table}` SET " . implode(', ', $sets) . " WHERE {$where}";

    if ($tf) {
        db_query($sql);
        global $conn;
        return mysqli_affected_rows($conn);
    }
    return db_query($sql);
}

function db_delete($table, $where) {
    $sql = "DELETE FROM `{$table}` WHERE {$where}";
    return db_query($sql);

//    return mysqli_affected_rows();
}
