<?php

function cart_addItem() {
    if (isPostRequest()) {
        if (isset($_SESSION['cart'][$_POST['id']]))
            $_SESSION['cart'][$_POST['id']] += $_POST['qty'];
        else
            $_SESSION['cart'][$_POST['id']] = $_POST['qty'];
    }
}

function cart_addCodeHtml() {
    if (isPostRequest()) {
        $id = $_POST['id'];
        $qty = $_SESSION['cart'][$id];
        $data = model('product')->getProductByID($id)[0];
        $_SESSION['cart_data'][$id]['image'] = $data['image'];
        $_SESSION['cart_data'][$id]['name'] = $data['name'];
        $_SESSION['cart_data'][$id]['price'] = $data['price'];
        renderCode($data, $id, $qty);
    }
}

function cart_addCodesHtml() {
    if (isPostRequest()) {
        if (isset($_SESSION['cart']) && isset($_SESSION['cart_data'])) {
            $cart = $_SESSION['cart'];
            $cartdata = $_SESSION['cart_data'];
        } else
            die();
        if (count($_SESSION['cart'] > 0)) {
            foreach ($cart as $id => $qty):
                $data = $cartdata[$id];
                renderCode($data, $id, $qty);
            endforeach;
        }
    }
}

function cart_removeItem() {
    if (isPostRequest()) {
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
        unset($_SESSION['cart_data'][$id]);
    }
}

function renderCode($data, $id, $qty) {
    ?>
    <tr class="item-cart <?php echo 'id' . $id ?>" style="display: none;">
        <td><img src="<?php echo IMAGE_PRODUCT . $data['image'] ?>" alt="<?php echo $id ?>"/></td>
        <td><span><?php echo $data['name'] ?></span></td>
        <td><span><?php echo number_format($data['price'], 0, ',', '.') ?> VNĐ</span></td>
        <td><span><?php echo $qty ?></span></td>
        <td><span><?php echo number_format($data['price'] * $qty, 0, ',', '.') ?> VNĐ</span></td>
        <td><a href="javascript:removeItem(<?php echo $id ?>,'<?php echo '.id' . $id ?>');" class="removeItem">Loại bỏ</a></td>
    </tr>
    <?php
}

function cart_sum() {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    $datacart = isset($_SESSION['cart_data']) ? $_SESSION['cart_data'] : null;
	if ($datacart == null || $cart == null) {
		echo  number_format(0, 0, ',', '.') . ' VNĐ';die;
	}
    $sum = 0;
    foreach ($cart as $id => $qty) {
        $data = $datacart[$id];
        $sum += $qty * $data['price'];
    }
    $_SESSION['CARTSUM'] = $sum;
    echo number_format($sum, 0, ',', '.') . ' VNĐ';
}

function cart_json() {
    header('Content-Type: application/json');
echo json_encode(array('foo' => 'bar'));
}