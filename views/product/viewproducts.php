<link href="styles/css/item.css" rel="stylesheet" type="text/css"/>
<div class="span12">
    <?php
    foreach ($data['products'] as $p):
        ?>
        <div class="pro-item">
            <div class="img_item">
                <div class="format_img">
                    <img src="<?php echo IMAGE_PRODUCT . $p['image'] ?>" alt="<?php echo $p['name'] ?>" width="120px" height="90px">
                </div>
            </div>
            <div class="name_item">
                <span><?php echo $p['name'] ?></span>
            </div>
            <div class="cost_item">
                <span><?php echo number_format($p['price'], 0, ',', '.') ?> VNĐ</span>
            </div>
            <a class="buy_item" href="javascript:buyitem(<?php echo $p['id'] ?>)"></a>
            <a class="viewdetail" href="index.php?c=product&m=detail&id=<?php echo $p['id'] ?>">Chi tiết</a>
        </div>
        <?php
    endforeach;
    ?>

</div>
<link href="styles/css/paging.css" rel="stylesheet" type="text/css"/>
<div id="paging">
    <ul>
        <?php
        $p = $data['page'];
        $m = $data['maxpage'];
        for ($i = 1; $i <= $m; $i++) {
            if ($i == $p) {
                ?>
                <li class="page focus"><b><?php echo $i ?></b></li>
                <?php
            } else {
                ?>
                <li class="page out"><a href="index.php?c=product&m=allPro&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                }
            }
            ?>
    </ul>
</div>
<script type="text/javascript">
    function buyitem(id) {
        _OpenF('#cart-main');
        $.ajax({
            type: "post",
            url: "index.php?c=cart&m=addItem",
            data: {
                id: id,
                qty: 1
            },
            success: function () {
                $.ajax({
                    type: "post",
                    url: "index.php?c=cart&m=addCodeHtml",
                    data: {
                        id: id
                    },
                    success: function (r) {
                        var cls = 'tr.item-cart.id' + id;
                        if (!$(cls).length)
                            $("tr.title").after(r);
                        else {
                            $(cls).addClass('old');
                            $(cls).after(r);
                            $('tr.item-cart.old').remove();
                        }
                        $("tr.item-cart").fadeIn();
                        $.ajax({
                            type: "post",
                            url: "index.php?c=cart&m=sum",
                            success: function(r){
                                $('#show_sum').html(r);
                            }
                        });
                    }
                });
            }
        });
    }
</script>