<?php
$errors = [];

if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
    
}elseif(isset($_SESSION['message2'])) {

    $message2 = $_SESSION['message2'];
    unset($_SESSION['message2']);

}elseif($exception){
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
    if(get_class($exception)=== 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';
$alertType2 = '';


if($message['type']==='error'){// se precisa de novos warnings configura aqui
    $alertType = 'danger';
}else {
    $alertType = 'success';
}

if($message2['type']==='error'){// se precisa de novos warnings configura aqui
    $alertType2 = 'danger';
}else {
    $alertType2 = 'success';
}

?>

<?php if($message)://só renderiza se passar pelo if ?> 
<div role="alert"
class="my-3 alert alert-<?= $alertType?>">
<?= $message['message'] ?>

</div>
<?php endif ?>

<?php if($message2)://só renderiza se passar pelo if ?> 
<div role="alert"
class="my-3 alert alert-<?= $alertType2?>">
<?= $message2['message2'] ?>

</div>
<?php endif ?>

