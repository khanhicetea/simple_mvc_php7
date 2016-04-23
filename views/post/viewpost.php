<link href="styles/css/allpost.css" rel="stylesheet" type="text/css"/>
<div class='span12 main input-form'>
    <div class="content-main">
        <?php echo $data['post'][0]['content-main'] ?>
    </div>
</div>
<link href="styles/css/comment.css" rel="stylesheet" type="text/css"/>
<div id="comment" class="span12">
    
</div>
<?php
//$commentfor = $_GET['id'];
?>
<script type="text/javascript">
    $.ajax({
        type: "post",
        url: "index.php?c=comment&m=view",
        data: {
            type: "<?php echo CMTPOST ?>",
            id: <?php echo $_GET['id'] ?>
        },
        success: function(result){
            $("#comment").html(result);
        }
    });
</script>