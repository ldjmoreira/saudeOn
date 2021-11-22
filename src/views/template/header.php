<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/w3Style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <link rel="stylesheet" href="assets/css/novopaciente.css">
    <link rel="stylesheet" href="assets/css/novopacientediag.css">
    <link rel="stylesheet" href="assets/css/listapaciente.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/monitoramento.css">
    <link rel="stylesheet" href="assets/css/evolucao.css">
    

    <title>SaudeON</title>
</head>
<body>

    <header class="header">
        <div class="caixa-header">
            <div class="logo"></div>           
            <div class="area2">

                <div class="nodropdown">
                    <div class="perfil-button">
                    <a class="linkSem" href="?sound=1"> 
                    <div class="user-button">
                        
                    <i class= "<?= $_SESSION['icone'] ?>"></i>
                    </div>
                    </a>

                    </div>


                </div>

                <div class="nodropdown">
                    <div class="perfil-button">
                        <div class="user-button">
                        <i class="icofont-user"></i>
                        </div>
                        <?= $user->name?>
                        <a class="no-style" href="logout.php">
                        <i class="icofont-logout ml-3 mr-2"></i>
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </header>

