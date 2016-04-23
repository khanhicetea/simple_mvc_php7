<?php

function product_add() {
    if(!isLogged()){
        redirect("index.php");
    }
    if (isPostRequest()) {
        $image_dir = IMAGE_PRODUCT;
        $dataPost = postData();
        $dataPost['image'] = model('product')->setImageName($_FILES['pro-img']['type'], $_FILES['pro-img']['tmp_name']);
        
        //var_dump($dataPost['image']);die();
        $dataPost['id_poster'] = $_SESSION['logged']['id'];
        if (model('product')->insertProduct($dataPost)) {
            move_uploaded_file($_FILES['pro-img']['tmp_name'], $image_dir . $dataPost['image']);
            redirect('index.php?c=product&m=manager');
        }
    } else {
        $data['template_file'] = 'product/addnewpro.php';
        render('layout.php', $data);
    }
}

function product_allPro(){
    $data = array();
    $per = 8;
    $page = $_GET['page'];
    $maxpage = ceil(model('product')->getPage() / $per);
    if ($page > $maxpage || $page <= 0) {
        redirect('index.php?c=product&m=allPro&page=1');
    }
    $data['page'] = $page;
    $data['maxpage'] = $maxpage;
    $data['products'] = model('product')->getProductWithPage($page, $per);
    $data['template_file'] = "product/viewproducts.php";
    render("layout.php", $data);
}

function product_manager(){
    if (!isLogged()) {
        redirect("index.php");
    }
    $data = array();
    $data['products'] = model('product')->getProductWHERE("where id_poster = {$_SESSION['logged']['id']}", "id,name,price,image,info");
    $data['template_file'] = "product/manager.php";
    render("layout.php", $data);
}

function product_edit() {
    if (!isLogged()) {
        redirect("index.php");
    }
    if (!isset($_GET['id'])) {
        redirect("index.php?c=product&m=manager");
    }
    if (isPostRequest()) {
        $image_dir = IMAGE_PRODUCT;
        $dataPost = postData();
        
        if ($_FILES['pro-img']['name'] != '') {
            $dataPost['image'] = model('product')->setImageName($_FILES['pro-img']['type'], $_FILES['pro-img']['tmp_name']);
        }
        
        if (model('product')->updateProduct($dataPost, $_GET['id'])) {
            if ($_FILES['pro-img']['name'] != '') {
                move_uploaded_file($_FILES['pro-img']['tmp_name'], $image_dir . $dataPost['image']);
            }
            redirect('index.php?c=product&m=manager');
        }
    }
    $data = array();
    $data['product'] = model('product')->getProductById($_GET['id']);
    $data['template_file'] = "product/editproduct.php";
    render("layout.php", $data);
}

function product_remove(){
    if (!isLogged()) {
        redirect("index.php");
    }
    if (!isset($_GET['id'])) {
        redirect("index.php?c=product&m=manager");
    }
    
    model('product')->removeProduct($_GET['id']);
    redirect('index.php?c=product&m=manager');
}

function product_detail(){
    $data['product'] = model('product')->getProductByID($_GET['id']);
    if($data['product'] == NULL)
        redirect("index.php?c=product&m=allPro");
    $data['template_file'] = "product/viewdetail.php";
    render("layout.php", $data);
}