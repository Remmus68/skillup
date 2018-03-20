<?php
// Посмотреть как работает flock(), gdlid php
require_once 'DB.php';
require_once 'model/User.php';
$fileName='counter.txt';
if (file_exists($fileName)) {
    $counter = file_get_contents($fileName);
} else {
    $counter = 0;
}
 $counter++;
 file_put_contents($fileName, $counter);
?>
<html>
    <head>
        <title>MySQL</title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: Calibri, sans-serif;
            }
            td, th {
                padding: 6px 10px;
            }

            table {
                border-collapse: collapse;
            }

            table, th {
                border: 2px solid #000;
            }

            td {
                border: 1px solid #000;
            }
        </style>
    </head>
    <?php

     $db = DB::getInstance();
     $user = new User();
     $db->execute('
            INSERT INTO users (firstname, lastname, password, age, growth)
            VALUES (:firstname, :lastname, :password, :age, :growth);', [
         'firstname' => $user->getFirstname(),
         'lastname' => $user->getLastname(),
         'password' => $user->getPassword(),
         'age' => $user->getAge(),
         'growth' => $user->getGrowth(),
     ]);
    ?>
    <body>
        <table>
            <tbody>
            <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>password</th>
                <th>age</th>
                <th>growth</th>
                <th>is_active</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            <?php
                foreach ($users as $user) {?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['firstname']?></td>
                        <td><?=$user['lastname']?></td>
                        <td><?=$user['password']?></td>
                        <td><?=$user['age']?></td>
                        <td><?=$user['growth']?></td>
                        <td><?=$user['is_active']?></td>
                        <td><?=$user['created_at']?></td>
                        <td><?=$user['updated_at']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <div class="counter">
        <?=$counter?>
    </div>
    </body>
</html>