<main class="content">
<div class="caixa-lista-paciente">
        <div class="caixa-lista-paciente-titulo">
            <h2>Grupo</h2>
        </div>
        <div class="caixa-lista-paciente-conteudo">
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
            <h2>Lista de paciente</h2>
        </div>
        <table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Identificação</th>
				<th>Nome</th>
				<th>Data de admissão</th>
				<th>Prontuário</th>
				<th>Concentrador</th>
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