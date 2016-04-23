<?php

function index_index() {
    //redirect('index.php' . (isLogged() ? '?c=payment&m=list' : '?c=auth&m=login'));
    
    $data = array();
    $data['posts'] = model('post')->getPostIndex();
    $data['products'] = model('product')->getProductIndex();
    $data['template_file'] = 'index/index.php';
    render("layout.php", $data);
}
