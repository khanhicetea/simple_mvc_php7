<h3>Menu Chính</h3>
<ul class="nav nav-tabs nav-stacked">
    <?php if ($logged = isLogged()): ?>
        <li><a href="#">Welcome <strong><?php echo $logged['name']; ?></strong></a></li>
        <li><a href="index.php?c=post&m=add">Đăng bài viết mới</a></li>
        <li><a href="index.php?c=post&m=manager">Quản lý bài viết</a></li>
        <li><a href="index.php?c=product&m=add">Thêm sản phẩm</a></li>
        <li><a href="index.php?c=product&m=manager">Quản lý sản phẩm</a></li>
        <li><a href="index.php?c=auth&m=logout">Đăng xuất</a></li>
    <?php else: ?>
        <li><a href="index.php?c=auth&m=login">Đăng nhập</a></li>
        <li><a href="index.php?c=auth&m=register">Đăng ký</a></li>
    <?php endif; ?>
</ul>