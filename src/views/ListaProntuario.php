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
   
    <title>Home</title>
</head>
<body>
<header class="header">
<div class="caixa-header">
    <div class="logo"></div>

    <div class="area2">
        <div class="dropdown">
            <div class="cadastro-button mx-5">
                <i class="icofont-book-alt"></i>
                Cadastro
            </div>
            <div class="cadastro-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#">
                            <i class="icofont-logout mr-2"></i>
                            cadastro de pacientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
 
        <div class="dropdown">
            <div class="perfil-button">
            
                Maria
                <i class="icofont-simple-down mx-2"></i>
                <div class="perfil-foto">________</div>
                
            </div>
            
            <div class="perfil-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
    

</div>  
</header>

<main class="content">

    <div class="caixa-Lista-paciente">
        <div class="caixa-titulo">
            <h2>local</h2>
        </div>
        <div class="caixa-conteudo">
            <p>setor:</p>
            <form class="mb-4" action="#" method="post">
                <div class="form__group field">
                <?php if ($user->is_admin) : ?>
                <select name="user" class="form__field mr-2" placeholder="Selecione o usuário ...">
                    <option value="">selecione o setor  </option>
                    <?php
                        foreach($users as $user) {
                            $selected = $user->id === $selectedUserId ? 'selected' : '';
                            echo "<option value='{$user->id}' {$selected} >{$user->name}</option>";
                        }
                    ?>
                </select>
                <?php endif ?>
                </div>
                <div class="botao-lado">
                <button class="botao-login">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="caixa-Lista-paciente">  
        <div class="caixa-titulo">
            <h2>Lista de prontuários</h2>
        </div>
        <table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Identificação</th>
				<th>Prontuário</th>
				<th>Médico</th>
				<th>paciente</th>
				<th>Setor</th>
				<th>Ação</th>
			</thead>
			<tbody>
                <?php
    

                foreach($listasPaciente as $paciente): ?>
					<tr>
                    <td><?= $paciente->id?></td>
                    <td><?= $paciente->name ?></td>
                    <td><?= $paciente->dataAdmissao?></td>
                    <td><?= $paciente->prontuario ?></td>
                    <td><?= $paciente->concentrador ?></td>
                    <td><?= "<i class=\"icofont-address-book \">
                    </i> <i class=\"icofont-ui-check \"></i>
                    <i class=\"icofont-book-alt \"></i>"
                     ?></td>
					</tr>
				<?php endforeach ?>

			</tbody>	
		</table>
    </div>


    
</main>


<script src="assets/js/app.js"></script>
</body>
</html>