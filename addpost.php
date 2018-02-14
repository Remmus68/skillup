<?php
    $pageTitle = 'Добавление поста';
    require_once('include/header.php');
?>
<div class="add_post_form">
    <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="firstname">Имя</label>
                <input class="form-control" id="firstname" name="firstname" placeholder="Имя" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input class="form-control" id="lastname" name="lastname" placeholder="Фамилия" required>
            </div>
            <div class="form-group">
                <label for="foto" class="control-label">Фото пользователя</label>
                <input type="file" class="form-control" name="foto" id="foto" placeholder="">
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Пол:</label>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="male" value="0" checked> Мужской
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="female" value="1"> Женский
                </label>
            </div>
            <div class="form-group">
                <label for="age" class="control-label">Возраст</label>
                <input class="form-control" id="age" name="age" value="18">
            </div>
            <div class="form-group">
                <label for="growth" class="control-label">Возраст</label>
                <input class="form-control" id="growth" name="growth" value="175.6">
            </div>
            <div class="form-group">
                <label for="stack-learn" class="control-label">Что вы изучаете?</label>

                <div class="checkbox">
                    <label><input type="checkbox" name="stack_learn[]" value="html" checked> HTML</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="stack_learn[]" value="css" checked> CSS</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="stack_learn[]" value="php"> PHP</label>
                </div>
                <div class="checkbox disabled">
                    <label><input type="checkbox" name="stack_learn[]" value="mysql" disabled> MySQL</label>
                </div>

            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="is_agree" value="1" required> Условия соглашения</label>
            </div>
            <button class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
<?php
    require_once('include/footer.php');
?>