<?php

function order_order() {
    if (isPostRequest()) {
        $data = postData();
        $data['money'] = $_SESSION['CARTSUM'];
        $cart = $_SESSION['cart'];
        $cartdata = $_SESSION['cart_data'];
        $idorder = model('order')->insert($data);
        if ($idorder > 0) {
            foreach ($cart as $id => $qty):
                $data2['idorder'] = $idorder;
                $data2['idproduct'] = $id;
                $data2['qty'] = $qty;
                $data2['price'] = $cartdata[$id]['price'];
                model('orderdetail')->insert($data2);
            endforeach;
        }
        unset_Cart();
        redirect("index.php");
    }
    $data = array();
    if (isset($_SESSION['cart']) && isset($_SESSION['cart_data'])) {
        if (count($_SESSION['cart']) > 0 && count($_SESSION['cart_data']) > 0) {
            $data['template_file'] = "order/vieworder.php";
            render("layout.php", $data);
        } else {
            if ($_SESSION['BackLink'] != NULL)
                redirect($_SESSION['BackLink']);
            else
                redirect('index.php');
        }
    }else {
        if ($_SESSION['BackLink'] != NULL)
            redirect($_SESSION['BackLink']);
        else
            redirect('index.php');
    }
}

function unset_Cart() {
    $_SESSION['cart'] = NULL;
    $_SESSION['cart_data'] = NULL;
    $_SESSION['CARTSUM'] = 0;
}
