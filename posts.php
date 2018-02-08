<?php
    define('PROJECT_NAME', 'Red eyes');
    $pageTitle = 'Главная';

    require_once('include/postlist.php');

    require_once('include/header.php');
   //var_dump($postList);
   //echo $postList[0]['user']['userpic'];
   //foreach ($postList as $post) {
     //  var_dump($post);
      // echo '<br />';
   //}
    //var_dump($_SERVER);
?>
             <div class="content">

                <?php
                    foreach ($postList as $post) {
                ?>
                <div class="post">
                    <div class="user_info">
                        <img src=<?='"' . $post['user']['userpic'] . '"'?> />
                        <div class="name"><?=$post['user']['firstname'] . ' ' . $post['user']['lastname']?></div>
                        <div class="posted"><?=$post['date']?></div>
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
                            <?=$post['description']?>
                            <?php
                                if (isset($post['taglist'])) {
                                    foreach ($post['taglist'] as $tag) {?>
                            <a href="<?=$tag['link']?>" class="hashtag"><?='#' . $tag['name']?></a>
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
