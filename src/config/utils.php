<?php

function addSuccessMsg($msg){
    $_SESSION['message'] = [
        'type' => 'success',
        'message' =>$msg
    ];
}
function addInformMsg($msg){
    $_SESSION['message2'] = [
        'type' => 'error',
        'message2' =>$msg
    ];
}
function addErrorMsg($msg){
    $_SESSION['message'] = [
        'type' => 'error',
        'message' =>$msg
    ];
}