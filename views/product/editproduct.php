<?php
$p = $data['product'][0];
?>
<div class="span12 main">
    <form class="form-actions" id="" action="" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name" value="<?php echo $p['name'] ?>"/></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="price" value="<?php echo $p['price'] ?>"/></td>
            </tr>
            <tr>
                <td>Thông tin sản phẩm</td>
                <td><textarea name="info" style="width: 70%; resize: none;" rows="5"><?php echo $p['info'] ?></textarea></td>
            </tr>
            <tr>
                <td>Hình sản phẩm</td>
                <td>
                    <img src="<?php echo IMAGE_PRODUCT . $p['image'] ?>" width="40" height="40" />
                    <input type="file" name="pro-img"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Lưu chỉnh sửa" class="btn btn-success"/></td>
            </tr>
        </table>
    </form>
</div>