<table class="table manager_product table-striped">
    <tr>
        <td></td>
        <th>Tên sản phẩm</th>
        <th>Thông tin sản phẩm</th>
        <th>Giá sản phẩm</th>
        <td></td>
    </tr>
    <?php
    foreach ($data['products'] as $p):
        ?>
        <tr>
            <td class="image_product">
                <img src="<?php echo IMAGE_PRODUCT . $p['image'] ?>" alt=""/>
            </td>
            <td class="name_product">
                <span><a href="#"><?php echo $p['name'] ?></a></span>
            </td>
            <td class="info_product">
                <span><?php echo $p['info'] ?></span>
            </td>
            <td class="price_product">
                <span><?php echo number_format($p['price'], 0, ',', '.') ?> VNĐ</span>
            </td>
            <td>
                <p><a href="index.php?c=product&m=edit&id=<?php echo $p['id'] ?>">Sửa</a></p>
                <p><a class="removePost" href="index.php?c=product&m=remove&id=<?php echo $p['id'] ?>">Xóa</a></p>
            </td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
<style>
    .image_product{
        width: 100px;
    }

    .name_product{
        width: 150px;
    }
    
    .info_product{
        width: 300px;
    }

    .manager_product span{
        text-align: justify;
        display: block;
        font: 500 13px sans-serif;
    }
</style>
<div id="all-dialog" style="display: none;">
    <div id="fog"></div>
    <div id="form-dialog">
        <p>Bạn có muốn xóa không?</p>
        <div id="btn-box">
            <button id="yes" class="btn">Có</button>
            <button id="no" class="btn">Không</button>
        </div>
    </div>
</div>
<link href="styles/css/dialog.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    var href = "";
    $(".removePost").click(function () {
        href = $(this).attr('href');
        $("#all-dialog").css("display", "block");
        return false;
    });
    $("#yes").click(function () {
        if (href != "") {
            location.href = href;
        }
    });
    $("#no").click(function () {
        $("#all-dialog").css("display", "none");
    });
</script>