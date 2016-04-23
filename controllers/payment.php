<?php

function payment_list() {
    $data = array();
    $currentUser = isLogged();
    
    $data['payments'] = model('payment')->getAllByUserId($currentUser['id']);
    
    $data['template_file'] = 'payment/list.php';
    render('layout.php', $data);
}

function payment_add() {
    $data = array();
    
    if (isPostRequest()) {
        $postData = postData();
        $currentUser = isLogged();
        
        if (model('payment')->addToUser($postData, $currentUser['id'])) {
            redirect('index.php?c=payment&m=list');
        }
    }
    
    $data['template_file'] = 'payment/add.php';
    render('layout.php', $data);
}
