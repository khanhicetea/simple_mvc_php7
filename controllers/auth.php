<?php

function auth_login() {
    $data = array();

    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authLogin($postData)) {
            if ($_SESSION['BackLink'] != NULL)
                redirect($_SESSION['BackLink']);
            else
                redirect('index.php');
        } else {
            $data['error'] = 'Login failed ! Please try again !';
        }
    }

    $data['template_file'] = 'auth/login.php';
    render('layout.php', $data);
}

function auth_register() {
    $data = array();
    $data['template_file'] = 'auth/register.php';

    if (isPostRequest()) {
        $postData = postData();
        if (model('user')->authRegister($postData)) {
            if ($_SESSION['BackLink'] != NULL)
                redirect($_SESSION['BackLink']);
            else
                redirect('index.php');
        } else {
            $data['error'] = 'Register failed ! Email exists ! Please try again !';
            $data['postData'] = $postData;
        }
    }

    render('layout.php', $data);
}

function auth_logout() {
    model('user')->authLogout();
    if ($_SESSION['BackLink'] != NULL)
        redirect($_SESSION['BackLink']);
    else
        redirect('index.php');
}

//hien thi noi dung trong bang
function auth_admin() {
    $data = array();
    $currentUser = isLogged();

    $data['admin'] = model('admin')->all($currentUser);

    $data['template_file'] = 'auth/admin.php';
    render('layout.php', $data);
}

//xoa mot bai dang trong bang
function auth_delete_blog() {
    $id = $_POST['ID'];
    if (model('admin')->delete_blog($id))
        auth_admin();
}

//them noi dung bai viet vao trong bang
function auth_dang_bai() {

    $data = array();

    if (isPostRequest()) {
        $postData = postData();
        $currentUser = isLogged();

        if (model('admin')->add_blog($postData)) {
            redirect('index.php?c=auth&m=dang_bai');
        }
    }
    $data['template_file'] = 'auth/dang_bai.php';
    render('layout.php', $data);
}

function auth_bai_viet() {
    $data = array();
    $currentUser = isLogged();

    $data['admin'] = model('admin')->all($currentUser);

    $data['template_file'] = 'auth/bai_viet.php';
    render('layout.php', $data);
}

//dua noi dung qua trang de sua
function auth_sua_bai() {
    $data = array();

    $id = $_POST['ID'];

    $data['admin'] = model('admin')->getOneBy($id, 'ID');
    $data['template_file'] = 'auth/sua_bai.php';
    render('layout.php', $data);
}

//hien thi trang san pham
function auth_san_pham() {
    $id = $_POST['ID'];
    $data['sp'] = model('sanpham')->lay_hinh('id');

    $data['template_file'] = 'auth/san_pham.php';
    render('layout.php', $data);
}

//update noi dung bai viet
function auth_thaydoi() {
    $id = $_POST['ID'];
    if (model('admin')->update_blog($id)) {
        auth_bai_viet();
    }
}