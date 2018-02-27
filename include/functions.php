<?php
function addAlertDanger ($message) {
    $GLOBALS['alerts'][] = [
        'type' => 'danger',
        'message' => $message,
    ];
}

function addAlertSuccess ($message) {
    $GLOBALS['alerts'][] = [
        'type' => 'success',
        'message' => $message,
    ];
}

function createPath($path) {
    $isSuccess = false;
    if (!file_exists($path)) {
        mkdir($path, 0777,true);
        $isSuccess = true;
    }
    return $isSuccess;
}
