<h3>Đăng nhập hệ thống</h3>
<?php if (isset($error)): ?>
    <div class="alert alert-error">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<form class="form-horizontal form-login" method="post" action="">
    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <input type="text" id="inputEmail" placeholder="Email" name="email" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Mật khẩu</label>
        <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password" name="password" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Đăng nhập</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    var input = $("<input>").attr('name', 'urlBack').val(href_back_after_login);
    //$('.form-login').append($(input));
    //alert(href_back_after_login);
</script>