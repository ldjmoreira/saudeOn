<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>SaudeON</title>
</head>
<body>

<header class="header">

    <div class="logo">
    </div>

    <div class="area2">

    </div>
   

</header>

<aside class="sidebar">
<nav class="menu mt-3">
        <ul class="nav-list">
        <li class="nav-item">
                <a href="login.php">
                    <i class="icofont-ui-check mr-2"></i>
                    Login
                </a>
            </li>
           
            
        </ul>
    </nav>
    <div class="sidebar-widgets">
        
    </div>
</aside>

<main class="content">

<div class="caixa-login">

    
    <div class="content-title2 ">

        <div class="esquerda">
            <h1>Fale Conosco</h1>
        </div>

    </div>
    <div class="linha-divisoria">
        <div class="esquerda"> 
        </div>

    </div>


    <div class="formulario">
    <form class="" action="#" method="post" autocomplete="off">
        <?php     include(TEMPLATE_PATH . '/messages.php') ?>
        <div class="">
        <div class="form-group col-md-12 mt-5">
            <input type="text" id="name" name="name" placeholder="Informe o nome"
                class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                value="<?= $cuidador[0]->name ?>">
            <div class="invalid-feedback">
                <?= $errors['name'] ?>
            </div>
        </div>
        <div class="form-group col-md-12">
            <input type="text" id="name" name="name" placeholder="Informe o E-mail"
                class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                value="<?= $cuidador[0]->name ?>">
            <div class="invalid-feedback">
                <?= $errors['name'] ?>
            </div>
        </div>
        <div class="form-group col-12 mt-5">
            
            <textarea id="evolucao" name="evolucao"class="form-control <?= $errors['evolucao'] ? 'is-invalid' : '' ?>"></textarea>
                                
            <div class="invalid-feedback">
                <?= $errors['evolucao'] ?>
            </div>
        </div>
            
            <div >
                <button class="botao-login">Entrar</button>
            </div>
        </div>   
        
    </form>
    </div>
</div> 
</main>

    
    
</body>
</html>