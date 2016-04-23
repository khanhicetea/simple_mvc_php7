<h3>Đăng ký hệ thống</h3>
<?php if (isset($error)): ?>
<div class="alert alert-error">
    <?php echo $error; ?>
</div>
<?php endif; ?>
<form class="form-horizontal" method="post" action="">
  <div class="control-group">
    <label class="control-label" for="inputName">Fullname</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="Fullname" name="name" value="<?php echo (isset($postData) ? $postData['name'] : ''); ?>" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" name="email" value="<?php echo (isset($postData) ? $postData['email'] : ''); ?>" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>