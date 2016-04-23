<?php
$p = $data['product'][0];
?>
<link href="styles/css/item.css" rel="stylesheet" type="text/css"/>
<link href="styles/css/viewproduct.css" rel="stylesheet" type="text/css"/>
<div id="left">
    <div id="image_product">
        <img src="<?php echo IMAGE_PRODUCT . $p['image'] ?>" alt="<?php echo $p['name'] ?>" width="240" height="180"/>
    </div>
</div>
<div id="right">
    <div id="name_product">
        <span><?php echo $p['name'] ?></span>
    </div>
    <div id="price_product">
        <span><?php echo number_format($p['price'], 0, ',', '.') ?> VNĐ</span>
    </div>
    <div id="info_product">
        <span class="title">Thông tin sản phẩm</span>
        <span><?php echo $p['info'] ?></span>
        <a class="buy_item" href="javascript:buyitem(<?php echo $p['id'] ?>)"></a>
    </div>
</div>
<link href="styles/css/comment.css" rel="stylesheet" type="text/css"/>

<div id="comment" class="span12">

</div>
<script type="text/javascript">
    $.ajax({
        type: "post",
        url: "index.php?c=comment&m=view",
        data: {
            type: "<?php echo CMTPRODUCT ?>",
            id: <?php echo $_GET['id'] ?>
        },
        success: function (result) {
            $("#comment").html(result);
        }
    });
</script>