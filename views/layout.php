<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Money Lover</title>
        <link rel="stylesheet" href="./styles/css/bootstrap.min.css">
        <link rel="stylesheet" href="./styles/css/styles.css">
        <script type="text/javascript" src="./styles/js/jquery.js"></script>
    </head>
    <body>
        <div class='container'>
            <div class='navbar navbar-inverse navbar-fixed-top'>
                <div class='navbar-inner nav-collapse' style="height: auto;">
                    <ul class="nav">
                        <li class="active"><a href="index.php">Money Lover</a></li>
                        <li class="active"><a href="index.php?c=post&m=allPost">Bài viết</a></li>
                        <li class="active"><a href="index.php?c=product&m=allPro">Sản phẩm</a></li>
                    </ul>
                    <ul class="nav" style="float: right; position: relative;">
                        <li><a href="#cart" id="btn-cart">Giỏ hàng</a></li>
                        <div id="cart-main">
                            <div id="all-cart">
                                <table style="text-align: center;" id="output-code">
                                    <tr class="title">
                                        <th style="width: 50px"></th>
                                        <th style="width: 150px">Tên sản phẩm</th>
                                        <th style="width: 120px">Giá sản phẩm</th>
                                        <th style="width: 30px">SL</th>
                                        <th style="width: 150px">Thành tiền</th>
                                        <th style="width: 50px"></th>
                                    </tr>
                                </table>
                                <script type="text/javascript">
                                    $.ajax({
                                        type: "post",
                                        url: "index.php?c=cart&m=addCodesHtml",
                                        success: function (r) {
                                            $('tr.title').after(r);
                                            $('.item-cart').show();
                                        }
                                    });
                                    function reloadSum() {
                                        $.ajax({
                                            type: "post",
                                            url: "index.php?c=cart&m=sum",
                                            success: function (r) {
                                                $('#show_sum').html(r);
                                            }
                                        });
                                        
                                        
                                    }
                                    function removeItem(id, obj) {
                                        $(obj).fadeOut(300);
                                        setTimeout(function () {
                                            $(obj).remove();
                                        }, 300);
                                        $.ajax({
                                            type: "post",
                                            url: "index.php?c=cart&m=removeItem",
                                            data: {
                                                id: id
                                            },
                                            success: function () {
                                                reloadSum();
                                            }
                                        });
                                    }
                                
                                </script>
                                <a href="#close" id="closeCart">Thu gọn</a>
                                <a href="index.php?c=order&m=order" id="order">Đặt hàng</a>
                                <span id="show_sum">
                                    <?php
//                                    if (isset($_SESSION['CARTSUM']))
//                                        echo number_format($_SESSION['CARTSUM'], 0, ',', '.') . ' VNĐ';
//                                    else {
//                                        echo '0 VNĐ';
//                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <script src="styles/js/cart.js" type="text/javascript"></script>
                        <link href="styles/css/cart.css" rel="stylesheet" type="text/css"/>
                    </ul>
                </div>
            </div>
            <div id='content' class='row-fluid'>
                <div class='span9 main'>
                    <?php include ROOT . DS . 'views' . DS . $template_file; ?>
                </div>
                <div class='span3 sidebar'>
                    <?php include ROOT . DS . 'views' . DS . 'blocks' . DS . 'sidebar.php'; ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                reloadSum();
            });
        </script>
            
    </body>
</html>