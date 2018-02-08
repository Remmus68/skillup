<?php
    define('PROJECT_NAME', 'Red eyes');
    $pageTitle = 'Главная';

    require_once('include/postlist.php');

    require_once('include/header.php');
?>
             <div class="content">

                <?php
                    foreach ($postList as $post) {
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

            </div>
        <?php require_once('include/header.php'); ?>
