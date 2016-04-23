<h3>Thêm chi tiêu cá nhân</h3>
<form id="frmPayment" class="form-horizontal" method="post" action="">
  <div class="control-group">
    <label class="control-label" for="inputName">Tên chi tiêu</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="Tên chi tiêu" name="name" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputTotal">Số tiền</label>
    <div class="controls">
      <input type="text" id="inputTotal" placeholder="Money" name="total" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
<script>
    $('#frmPayment').submit(function() {
        if ($('#inputTotal').val() > 10000000) {
            if (!confirm("Bạn có chắc là số tiền chi tiêu trên 10 triệu ?")) {
                $('#inputTotal').focus();
                return false;
            }
        }
        return true;
    });
</script>