<?php
    define('PROJECT_NAME', 'Red eyes');
    $pageTitle='Главная';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $pageTitle . ' | ' .PROJECT_NAME ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container">
        <?php require_once('include/header.php'); ?>
             <div class="content">
                <div class="post">
                    <div class="user_info">
                            <img src="image/female-user.jpg" />
                        <div class="name">Екатерина Захарова</div>
                        <div class="posted">Добавлено 2 часа назад</div>
                    </div>
                    <div class="foto">
                        <img src="image/post1.jpg">
                    </div>
                    <div class="post_info">
                        <div class="like">
                            <img src="image/heart.png">
                            125
                        </div>
                        <div class="comment">
                            Теперь я тоже жду ебилдов.
                            <a href="#" class="hashtag">#gentoo</a>
                            <a href="#" class="hashtag">#dwm</a>
                        </div>
                    </div>
                </div>

                <div class="post">
                    <div class="user_info">
                            <img src="image/male-user.jpg" />
                        <div class="name">Алексей Черепанов</div>
                        <div class="posted">Добавлено 3 часа назад</div>
                    </div>
                    <div class="foto">
                        <img src="image/post2.jpg">
                    </div>
                    <div class="post_info">
                        <div class="like">
                            <img src="image/heart.png">
                            543
                        </div>
                        <div class="comment">
                            Всех с пятницей!
                            <a href="#" class="hashtag">#пингвин</a>
                            <a href="#" class="hashtag">#пиво</a>
                            <a href="#" class="hashtag">#пятница</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>