<?php

class Payment extends Model {
    public $table = 'payments';
    public $primary_key = 'id';
    
    public function getAllByUserId($user_id) {
        $first_day_this_month = date("Y-m-d", strtotime('first day of this month'));
        $first_day_next_month = date("Y-m-d", strtotime('first day of next month'));
        
        $sql = "SELECT * FROM `{$this->table}`
                    WHERE `user_id` = " . intval($user_id) . "
                            AND `paid_day` >= '" . $first_day_this_month  . "'
                            AND `paid_day` < '" . $first_day_next_month  . "'";
        
        return db_get_all($sql);
    }
    
    public function addToUser($postData, $user_id) {
        $postData['paid_day'] = date("Y-m-d H:i:s");
        $postData['user_id'] = $user_id;
        
        return db_insert($this->table, $postData);
    }
}
