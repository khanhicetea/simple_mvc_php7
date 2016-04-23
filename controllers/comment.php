<?php

function comment_view() {
    $data = array();
    $id = $_POST['id'];
    $type = $_POST['type'];
    $data['cmts'] = model('comment')->getCommentWhatById($id, $type);
    include ROOT . DS . 'views' . DS . "comment/viewComment.php";
    //$data['template_file'] = "comment/viewComment.php";
    //render("layout.php", $data);
}

function comment_addCMT() {
    if (isLogged()) {
        $data = array();
        $data = postData();
        $data['commenter'] = $_SESSION['logged']['id'];
        $data['time'] = date("Y/m/d h:i:s", time());
        model('comment')->insertComment($data);
        ?>
        <div class="item-comment">
            <div class="time-comment">
                <span><?php echo $data['time'] ?></span>
            </div>
            <span class="name"><b><?php echo $_SESSION['logged']['name'] ?>:</b></span>
            <span class="content"><?php echo $data['content'] ?></span>
        </div>
        <?php
    } else {
        echo 0;
    }
}
