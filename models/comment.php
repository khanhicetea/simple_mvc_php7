<?php

class Comment extends Model {

    public $table = "comments";
    public $primary_key = "id";
	public $table_user = "users";
	public $primary_key_user = "id";

    public function getCommentWhatById($id, $for = CMTPOST, $what = "a.id,commenter,name,content,time") {
        $sql = "SELECT {$what} FROM {$this->table} a left join {$this->table_user} b on a.commenter = b.{$this->primary_key_user} "
        . "where `type` = '{$for}' and `commentfor` = '$id' order by a.id desc";
        return db_get_all($sql);
    }
    
    public function insertComment($data){
        return db_insert($this->table, $data);
    }

}
