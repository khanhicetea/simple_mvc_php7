<?php
$p = $data['post'][0];
?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<style>
    .input-form td{
        vertical-align: middle;
    }
</style>



<div class='span12 main input-form'>
    <form class="form-actions" action="" method="post" id="form-add" enctype="multipart/form-data">
        <table class="table">
            <tr style="width: 100%;">
                <td style="width: 65px;">Tiêu đề:</td>
                <td>
                    <input type="text" id="title" name="title" style="width: 50%;" value="<?php echo $p['title'] ?>"/>
                </td>
            </tr>
            <tr>
                <td>Tóm tắt:</td>
                <td>
                    <textarea id="summary" name="summary" style="width: 70%; resize: none;" rows="3"><?php echo $p['summary'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung:</td>
                <td>
                    <textarea id="input-content" name="content-main" id="input-content"><?php echo $p['content-main'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Ảnh đại diện:</td>
                <td>
                    <img src="<?php echo IMAGE_POST . $p['image'] ?>" alt="" width="40" height="40" id="img-preview"/><input type="file" id="img-file" name="img-file"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Lưu bài" class="btn btn-success" id="btn-submit"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    CKEDITOR.replace('content-main', {
        width: '100%',
        height: '400px',
        uiColor: '#535656',
        toolbar: [
            ['Undo', 'Redo'],
            ['Bold', 'Italic', 'Underline', 'Strike'],
            ['TextColor', 'BGColor'],
            ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
            ['NumberedList', 'BulletedList'],
            ['Outdent', 'Indent'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink', '-', 'Replace'],
            ['Format', 'Font', 'FontSize']
        ]
    });
</script>
<script src="ckeditor/adapters/jquery.js" type="text/javascript"></script>