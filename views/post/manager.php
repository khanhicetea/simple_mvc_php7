<table class="table manager_post table-striped">
    <tr>
        <td></td>
        <th>Tiêu đề</th>
        <th>Tóm tắt</th>
        <td></td>
    </tr>
    <?php
    foreach ($data['posts'] as $p):
        ?>
        <tr>
            <td class="image_post">
                <img src="<?php echo IMAGE_POST . $p['image'] ?>" alt=""/>
            </td>
            <td class="title_post">
                <span><a href="index.php?c=post&m=viewPost&id=<?php echo $p['id'] ?>"><?php echo $p['title'] ?></a></span>
            </td>
            <td class="summary_post">
                <span><?php echo $p['summary'] ?></span>
            </td>
            <td>
                <p><a href="index.php?c=post&m=edit&id=<?php echo $p['id'] ?>">Sửa</a></p>
                <p><a class="removePost" href="index.php?c=post&m=remove&id=<?php echo $p['id'] ?>">Xóa</a></p>
            </td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
<style>
    .image_post{
        width: 100px;
    }

    .title_post{
        width: 100px;
    }

    .manager_post span{
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
    href_back_after_login = "index.php?c=product&m=detail&id=11";
    $(".removePost").click(function () {
        href = $(this).attr('href');
        $("#all-dialog").css("display", "block");
        return false;
    });
    $("#yes").click(function () {
        if (href !== "") {
            location.href = href;
        }
    });
    $("#no").click(function () {
        $("#all-dialog").css("display", "none");
    });
</script>