<h3>Quản lý chi tiêu cá nhân</h3>
<p>
    <a href="index.php?c=payment&m=add" class="btn btn-primary">Thêm chi tiêu</a>
</p>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Tên chi tiêu</th>
        <th>Ngày chi tiêu</th>
        <th>Số tiền</th>
    </tr>
    <?php
        $i = 0;
        $total = 0;
        foreach ($payments as $p):
        $i++;
        $total += intval($p['total']);
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $p['name']; ?></td>
        <td><?php echo $p['paid_day']; ?></td>
        <td class="text-right"><?php echo number_format($p['total'], 0, ',', '.'); ?></td>
    </tr>
    <?php        
        endforeach;
        if ($i):
    ?>
    <tr>
        <td colspan="3"><strong>Tổng cộng :</strong></td>
        <td class="text-right"><strong><?php echo number_format($total, 0, ',', '.'); ?></strong></td>
    </tr>
    <?php else: ?>
    <tr>
        <td colspan="4" class="text-center"><strong>Chưa có chi tiêu nào trong tháng này.</strong></td>
    </tr>
    <?php endif; ?>
</table>