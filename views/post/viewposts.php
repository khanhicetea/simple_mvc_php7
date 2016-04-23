<link href="styles/css/allpost.css" rel="stylesheet" type="text/css"/>
<div class='span12'>
    <?php
    foreach ($data['posts'] as $p):
        ?>
        <div class="post-item">
            <div class="img-post-item">
                <div class="format-img">
                    <img src="<?php echo IMAGE_POST . $p['image'] ?>" alt="post-image"/>
                </div>
            </div>
            <div class="right-post-list">
                <div class="title">
                    <a href="index.php?c=post&m=viewPost&id=<?php echo $p['id'] ?>"><span><?php echo $p['title'] ?></span></a>
                </div>
                <div class="summary">
                    <p><?php echo substr($p['summary'], 0, 150) . "..." ?></p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    ?>
</div>
<link href="styles/css/paging.css" rel="stylesheet" type="text/css"/>
<div id="paging">
    <ul>
        <?php
        $p = $data['page'];
        $m = $data['maxpage'];
        for ($i = 1; $i <= $m; $i++) {
            if ($i == $p) {
                ?>
                <li class="page focus"><b><?php echo $i ?></b></li>
                <?php
            } else {
                ?>
                <li class="page out"><a href="index.php?c=post&m=allPost&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                }
            }
            ?>
    </ul>
</div>