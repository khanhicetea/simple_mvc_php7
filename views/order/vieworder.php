<script src="styles/js/myJs.js" type="text/javascript"></script>
<form id="form-order" name="form-order" method="post" action="">
    <b class="title_order">Đặt hàng</b>
    <table>
        <tr>
            <td style="width: 100px">Họ tên</td>
            <td><input type="text" name="name" id="name"/></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="phone" id="phone"/></td>
        </tr>
    </table>
    <table class="table table-striped">
        <tr class="titleorder">
            <th style="width: 40px"><span>STT</span></th>
            <th style="width: 200px"><span>Tên sản phẩm</span></th>
            <th style="width: 100px"><span>Đơn giá</span></th>
            <th style="width: 80px"><span>Số lượng</span></th>
            <th style="width: 150px"><span>Thành tiền</span></th>
        </tr>
        <?php
        $cart = $_SESSION['cart'];
        $cart_data = $_SESSION['cart_data'];
        $i = 1;
        foreach ($cart as $id => $qty):
            $data = $cart_data[$id];
            ?>
            <tr class="orderitem">
                <td><?php echo $i ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo number_format($data['price'], 0, ',', '.') ?> VNĐ</td>
                <td><?php echo $qty ?></td>
                <td><?php echo number_format($data['price'] * $qty, 0, ',', '.') ?> VNĐ</td>
            </tr>
            <?php
            $i++;
        endforeach;
        ?>
    </table>
    <div id="sum_order">
        <span>Tổng cộng: </span>
        <span><?php echo number_format($_SESSION['CARTSUM'], 0, ',', '.') ?> VNĐ</span>
    </div>
    <div id="btn_order">
        <input type="submit" value="Đặt hàng" class="btn btn-success"/>
    </div>
</form>
<link href="styles/css/dialog.css" rel="stylesheet" type="text/css"/>
<div id="all-dialog" style="display: none;">
    <div id="fog"></div>
</div>
<link href="styles/css/order.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    $('#form-order').submit(function () {
        var arrayInput = ['#name','#phone'];
        resetInputBG(arrayInput);
        var error = 0;
        if ($('#name').val().trim() === "") {
            $('#name').css('background', '#FFF7E5');
            error++;
        }
        if ($('#phone').val().trim() === "") {
            $('#phone').css('background', '#FFF7E5');
            error++;
        }
        if (error > 0)
            return false;
        $('#all-dialog').show();
    });
</script>