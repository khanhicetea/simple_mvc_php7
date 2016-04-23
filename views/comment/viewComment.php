<div>
    <div><b>Bình luận</b></div>
    <div id="inputer">
        <textarea id="input-comment" rows="3" placeholder="Nhập bình luận..."></textarea>
        <button class="btn" id="submit-comment">Gửi</button>
    </div>
</div>
<div id="output-comment">
    <?php
    $cmts = $data['cmts'];
    if (count($cmts) == 0) {
        ?>
        <i id="none-comment">Chưa có bình luận!</i>
        <?php
    } else {
        foreach ($cmts as $c):
            ?>
            <div class="item-comment">
                <div class="time-comment">
                    <span><?php echo $c['time'] ?></span>
                </div>
                <span class="name"><b><?php echo $c['name'] ?>:</b></span>
                <span class="content"><?php echo $c['content'] ?></span>
            </div>
            <?php
        endforeach;
    }
    ?>
</div>
<div id="all-dialog" style="display: none;">
    <div id="fog"></div>
    <div id="form-dialog">
        <p>Bạn chưa đang nhập!</p>
        <div id="btn-box">
            <button id="yes" class="btn">Đăng nhập</button>
            <button id="no" class="btn">Trở lại</button>
        </div>
    </div>
</div>
<link href="styles/css/dialog.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    var href = "index.php?c=auth&m=login";
    $("#yes").click(function () {
        if (href !== "") {
            location.href = href;
        }
    });
    $("#no").click(function () {
        $("#all-dialog").fadeOut();
    });
</script>
<script type="text/javascript">
    $("#submit-comment").click(function () {
        summit_comment();
    });

    $("#input-comment").keydown(function (e) {
        var code = e.keyCode || e.which;
        if (code === 13) {
            summit_comment();
            return false;
        }
    });

    function summit_comment() {
        if ($("#input-comment").val().trim() !== "")
            $.ajax({
                type: "post",
                url: "index.php?c=comment&m=addCMT",
                data: {
                    type: "<?php echo $type ?>",
                    content: $("#input-comment").val().trim(),
                    commentfor: <?php echo $id ?>
                },
                success: function (r) {
                    if (r === '0') {
                        $('#all-dialog').fadeIn();
                    } else {
                        $("#input-comment").val("");
                        $("#output-comment").html(r + $("#output-comment").html());
                        var none_comment = document.getElementById("none-comment");
                        if (none_comment !== null) {
                            none_comment.remove();
                        }
                    }
                }
            });
        else
            $("#input-comment").focus();
    }
</script>