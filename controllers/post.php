<?php

function post_add() {
    if (!isLogged()) {
        redirect("index.php");
    }
    if (isPostRequest()) {
        $image_dir = IMAGE_POST;
        $dataPost = postData();
        $dataPost['image'] = model('post')->setImageName($_FILES['img-file']['type'], $_FILES['img-file']['tmp_name']);
        $dataPost['id_poster'] = $_SESSION['logged']['id'];
        if (model('post')->insertPost($dataPost)) {
            move_uploaded_file($_FILES['img-file']['tmp_name'], $image_dir . $dataPost['image']);
            redirect('index.php?c=post&m=manager');
        }
    } else {
        $data['template_file'] = 'post/addnewpost.php';
        render('layout.php', $data);
    }
}

function post_allPost() {
    $data = array();
    $per = 8;
    //$data['posts'] = model('post')->getAllPost();
    $page = $_GET['page'];
    $maxpage = ceil(model('post')->getPage() / $per);
    if ($page > $maxpage || $page <= 0) {
        redirect('index.php?c=post&m=allPost&page=1');
    }
    $data['page'] = $page;
    $data['maxpage'] = $maxpage;
    $data['posts'] = model('post')->getPostWithPage($page, $per);
    $data['template_file'] = 'post/viewposts.php';
    render('layout.php', $data);
}

function post_viewPost() {
    $data['post'] = model('post')->getPostById($_GET['id']);
    if ($data['post'] == NULL)
        redirect('index.php?c=post&m=allPost');
    $data['template_file'] = "post/viewpost.php";
    render('layout.php', $data);
}

function post_manager() {
    if (!isLogged()) {
        redirect("index.php");
    }
    $data = array();
    $data['posts'] = model('post')->getPostWHERE("where id_poster = {$_SESSION['logged']['id']}", "id,title,summary,image");
    $data['template_file'] = "post/manager.php";
    render("layout.php", $data);
}

function post_edit() {
    if (!isLogged()) {
        redirect("index.php");
    }
    if (!isset($_GET['id'])) {
        redirect("index.php?c=post&m=manager");
    }
    if (isPostRequest()) {
        $image_dir = IMAGE_POST;
        $dataPost = postData();

        if ($_FILES['img-file']['name'] != '') {
            $dataPost['image'] = model('post')->setImageName($_FILES['img-file']['type'], $_FILES['img-file']['tmp_name']);
        }

        if (model('post')->updatePost($dataPost, $_GET['id'])) {
            if ($_FILES['img-file']['name'] != '') {
                move_uploaded_file($_FILES['img-file']['tmp_name'], $image_dir . $dataPost['image']);
            }
            redirect('index.php?c=post&m=manager');
        }
    }
    $data = array();
    $data['post'] = model('post')->getPostById($_GET['id']);
    $data['template_file'] = "post/editpost.php";
    render("layout.php", $data);
}

function post_remove() {
    if (!isLogged()) {
        redirect("index.php");
    }
    if (!isset($_GET['id'])) {
        redirect("index.php?c=post&m=manager");
    }
    model('post')->removePost($_GET['id']);
    redirect('index.php?c=post&m=manager');
}
