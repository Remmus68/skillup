<?php
    $pageTitle = 'Главная';
    $useHashtagFilter = false;

    require_once('include/postlist.php');

    if (isset($_GET['hashtag'])) {
        foreach ($postList as $postIndex => $post) {
            $postList[$postIndex]['containsHashtag'] = false;
            foreach ($post['taglist'] as $hashtag) {
                if ($hashtag==$_GET['hashtag']) {
                    $postList[$postIndex]['containsHashtag'] = true;
                    if (!($useHashtagFilter)) {
                        $useHashtagFilter = true;
                    }
                    break;
                }
            }
        }
        if ($useHashtagFilter) {
            $pageTitle = $pageTitle . ': #' . $_GET['hashtag'];
        }
    }

    require_once('include/header.php');

    foreach ($postList as $post) {
        if (($useHashtagFilter) && !($post['containsHashtag'])) {
            continue;
        }
?>
<div class="post">
    <div class="user_info">
        <img src=<?='"' . $post['user']['userpic'] . '"'?> />
        <div class="name"><?=$post['user']['firstname'] . ' ' . $post['user']['lastname']?></div>
        <div class="posted"><?=$post['created_at']?></div>
    </div>
    <div class="foto">
        <img src=<?='"' . $post['foto'] . '"'?> />
    </div>
    <div class="post_info">
        <div class="like">
        <img src="image/heart.png">
            <?=$post['likes']?>
        </div>
        <div class="comment">
            <?php
                echo $post['description'];
                if (isset($post['taglist'])) {
                    foreach ($post['taglist'] as $hashtag) {?>
                    <a href="<?='?hashtag=' . $hashtag?>" class="hashtag"><?='#' . $hashtag?></a>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
                <?php } ?>
<?php require_once('include/footer.php'); ?>
