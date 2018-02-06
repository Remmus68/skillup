<?php

// Строка
$string = 'S0me t3xt';
var_dump($string);

// Целое число
$integer = 5;
var_dump($integer);

//Число с плавающей точкой
$float = 12.49876;
var_dump($float);

//Булевое значение
$boolean = true;
var_dump($boolean);

//Значение NULL
$boolean=null;
var_dump($boolean);

//Массив
$array = [
    1 => 'red',
    'green',
    'blue',
    'newcolor' => [
    'violet',
    'indigo',
]
];
$array[] ='gray';
var_dump($array);
var_dump($array[2]);

//Ассоциативный массив
$assocArray = [
    'name' => 'Vasya',
    'age' => 19,
    'grow' => 175.5,
    'is_smoking' => false,
    'rate' => [
        [
            'rate' => 3,
            'teacher' => 'Ivanova 2'
        ],
        [
            'rate' => 4,
            'teacher' => 'Ivanova 1'
        ]
    ],
];
$assocArray['rate'][] = [
    'rate' => 5,
    'teacher' => 'Ivanova 3',
];

$assocArray['rate'][] = [
    'rate' => 4,
    'teacher' => 'Ivanova 3',
];


$assocArray['lastname'] = 'Ivanov';
var_dump($assocArray);

var_dump(count($assocArray));

var_dump($assocArray['is_smoking']);
?>
