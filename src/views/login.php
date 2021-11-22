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
                <a href="FaleConosco.php">
                    <i class="icofont-ui-check mr-2"></i>
                    Fale Conosco
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
            <h1>Iniciar sessão</h1>
        </div>

    </div>
    <div class="linha-divisoria">
        <div class="esquerda"> 
        </div>

    </div>
    <div class="bem-vindo">
       Bem vindo
       <div class="linha-divisoria2">

       </div>
    </div>

    <div class="formulario">
    <form class="" action="#" method="post" autocomplete="off">
        <?php     include(TEMPLATE_PATH . '/messages.php') ?>
        <div class="">
            <div class="form__group field">
                    <input type="email" id='email' name="email" class="form__field <?= $errors['email'] ? 'is-invalid' : '' ?>"   
                    value="<?= $email ?>"   placeholder="E-mail"required />
                    <label for="email" class="form__label">Email</label>
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>

            </div>
            <div class="form__group field">
                    <input type="password" id='password' name="password" 
                     class="form__field <?= $errors['password'] ? 'is-invalid' : '' ?>"   
                    placeholder="Senha"required />
                    <label for="password" class="form__label">Senha</label>
                    <div class="invalid-feedback">
                        <?= $errors['password'] ?>
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