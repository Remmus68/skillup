<?php

//global $alerts;
//$alerts = [];

require_once 'include/functions.php';

require_once 'model/User.php';

//$a=1;
//
//var_dump($GLOBALS);
//die;
define ('UPLOAD_DIR', 'upload/');
$GLOBALS['alerts'] = [];
$param = $_POST;
//$arrResult = glob('*.txt');
//foreach ($arrResult as $fileName) {
//    var_dump(filesize($fileName));
    //copy($fileName, './css/' . $fileName . '.bak');
    //rename('./css/' . $fileName . '.bak', './css/' . $fileName);
    //unlink('./css/' . $fileName);
//}
//var_dump($arrResult);
//die();

/*$h = fopen('test.txt', 'a+');
for ($i=1; $i<=100; $i++) {
    fwrite($h, $i. "\t" .'new string' . PHP_EOL);
}
fclose($h);
die();

file_put_contents('test.txt', 'Hello!');
$result = file_get_contents('http://roma.com/');
print_r($result);
die();*/
function getFullName($user) {
    return $user['firstname'] . ' ' . $user['lastname'];
}



//var_dump($param);
//var_dump($_GET);
if (isset($param['is_agree'])) {

//    header('Location: ./path/to/route');

    $user = new User;
    $user->setFirstname($param['firstname']);
    $user->setLastname($param['lastname']);
    $user->setAge((int)$param['age']);
    $user->setSex($param['sex']);
    $user->setGrowth((float)$param['growth']);
    $user->setPassword($param['password']);
    $user->setStackLearn($param['stack_learn']);
//    $user = [
//        'firstname' => $param['firstname'],
//        'lastname'=> $param['lastname'],
//        'sex' => $param['sex'],
//        'age' => (int)$param['age'],
//        'growth' => (float)$param['growth'],
//        'password' => $param['password'],
//        'stack_learn' => $param['stack_learn'],
//        'list_fruits' => 'яблоко, апельсин, груша',
//    ];
    if (!$user->isValidateFullName()) {
       addAlertDanger('Слишком короткое имя или фамилия');
    }
//    $jsonUser = json_encode($user, JSON_UNESCAPED_UNICODE);
//    $arrUser = json_decode($jsonUser, true);
//    $objUser = json_decode($jsonUser, false);
//    $test = serialize(12);
//    var_dump($test);
//    var_dump(unserialize($test));
//    var_dump($jsonUser);
//    var_dump($arrUser);
//    var_dump($objUser -> firstname);
//    var_dump(serialize($objUser));
//    die();

//    var_dump($_FILES);
//    die();
    if (isset($_FILES['foto']) && empty($_FILES['foto']['error'])) {
        $uploadPath = UPLOAD_DIR . 'foto/';
        createPath($uploadPath);
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadPath . $_FILES['foto']['name']);
    }

    if (!(in_array('html', $user->getStackLearn()) && in_array('php', $user->getStackLearn()))) {
        addAlertDanger('Требуется html и php');
    }

    if (empty($errorMessage)) {
        try {
            $db = new PDO('mysql: host=localhost; dbname=php2; charset=utf8;', 'root', 'root');
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $db->prepare("
            INSERT INTO users (firstname, lastname, password, age, growth)
            VALUES (:firstname, :lastname, :password, :age, :growth);
        ");
            $result->execute([
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'password' => $user->getPassword(),
                'age' => $user->getAge(),
                'growth' => $user->getGrowth(),
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            die();
        }

    }

}
var_dump(getFullName($user));
$string = 'Hello world!';
$result = substr($string, 6, 2);
var_dump($result);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillUP | Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php if ($GLOBALS['alerts']) {?>
<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    <?php foreach($GLOBALS['alerts'] as $message) {
            echo $message;
        }
     } ?>
</div>

<?php if(isset($user)) {?>
<h3>Мы едим:</h3>

<ul>
    <?php foreach (explode(', ' , $user->getFruits()) as $key => $lang ) { ?>
        <li><?= $lang ?></li>
    <?php } ?>
</ul>
<h3>Мы изучаем: <?= implode(', ' , $user->getFruits()) ?></h3>
<?php } ?>

<div class="container-fluid jumbotron col-md-offset-4 col-md-5">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">Имя</label>
            <input class="form-control" id="firstname" name="firstname" placeholder="Имя" value="<?= isset($param['name']) ? $param['name'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input class="form-control" id="lastname" name="lastname" placeholder="Фамилия" required>
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
        </div>
        <div class="form-group">
            <label for="foto" class="control-label">Фото</label>
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

</body>
</html>