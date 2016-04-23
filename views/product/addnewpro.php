<div class="span12 main">
    <form class="form-actions" id="form-add" action="" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name" id="name"/></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="price" id="price"/></td>
            </tr>
            <tr>
                <td>Thông tin sản phẩm</td>
                <td><textarea name="info" style="width: 70%; resize: none;" rows="5" id="info"></textarea></td>
            </tr>
            <tr>
                <td>Hình sản phẩm</td>
                <td><input type="file" name="pro-img"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thêm" class="btn btn-success"/></td>
            </tr>
        </table>
    </form>
</div>
<script>
    $('#form-add').submit(function () {
        var error = 0;
        if ($('#name').val().trim() === "") {
            $('#name').css('background', '#FFF7E5');
            error++;
        }
        if ($('#price').val().trim() === "") {
            $('#price').css('background', '#FFF7E5');
            error++;
        }
        if ($('#info').val().trim() === "") {
            $('#info').css('background', '#FFF7E5');
            error++;
        }
        if (error > 0)
            return false;
    });
</script>