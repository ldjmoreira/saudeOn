<script src="assets/js/MenuEvolucao2.js"> </script>

<main class="content w3-animate-opacity">
    <?php
    include(TEMPLATE_PATH . "/messages.php");

    ?>
    <form action="#" method="post" id="idOfForm">
        <input type="hidden" name="paciente" value="<?= $paciente[0]->id ?>">
        <input type="hidden" name="operador" value="<?= $id_Op?>">
        <input type="hidden" name="nomeProfissional" value="<?= $infProfissional->profissional_id ?>">
        <input type="hidden" name="CBO" value="<?= $infProfissional->CBO?>"> 

        <input type="hidden" id="evolucao_id" name="evolucao_id" value="<?= $evolucaoResult->evolucao ?>"> 
        
        
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Perfil do paciente3</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                <div class="caixa-padrao-conteudo-esquerda-foto">
                    <img class="evolucao-foto w3-border" src="assets/img/avatar2.png" alt="Smiley face" width="100" height="100">
                </div>
                <div class="caixa-padrao-conteudo-direita-conteudo">
                    <h4>Nome:  <?= $paciente[0]->name ?> </h4>
                    
                    <h4>Idade: <?= $age ?></h4>
                </div>
                <div>

                        <a class="a-link-button" href="Evolucao2.php?novo=<?=$paciente[0]->id ?>">
                            registrar nova evolução
                        </a>


                </div>
            </div>

                
        </div> 

        <div class="caixa-data">
        <h3><?= $today  ?></h3>
        </div>

    <div class="caixa-padrao">  
        <div class="caixa-padrao-titulo">
            <h2>Dados gerais</h2>
        </div>
        <div class="caixa-padrao-conteudo">
            <div class="form-row">

            <div class="form-group col-md-4">
                <label for="nomeProfissional2">Profissional</label>
                <input type="nomeProfissional2" id="nomeProfissional12" name="nomeProfissional12" placeholder="Informe o nome do profissional"
                    class="form-control <?= $errors['nomeProfissional'] ? 'is-invalid' : '' ?>"
                    value="<?= $evolucaoResult->nome_Prof ?>" readonly>
                <div class="invalid-feedback">
                    <?= $errors['nomeProfissional'] ?>
                </div>
            </div>



            <div class="form-group col-md-4">
                <label for="data_evolucao">Data de Admissão</label>
                <input type="date" id="data_evolucao" name="data_evolucao"
                    class="form-control <?= $errors['data_evolucao'] ? 'is-invalid' : '' ?>"
                    value="<?= $evolucaoResult->data_evolucao ?>" readonly>
                <div class="invalid-feedback">
                    <?= $errors['data_evolucao'] ?>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="CBO2">CBO</label>
                <input type="text" id="CBO2" name="CBO2" placeholder="Informe a senha"
                    class="form-control <?= $errors['CBO'] ? 'is-invalid' : '' ?>"
                    value="<?= $evolucaoResult->codigo ?> - <?= $evolucaoResult->descricao ?> " readonly>
                <div class="invalid-feedback">
                    <?= $errors['CBO'] ?>
                </div>
            </div>
            </div>
           
            </div>
                
            </div>

            <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h2>Evolução</h2>
                </div>
                <div class="caixa-padrao-conteudo">


                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="evolucao">Evolução</label>
                            
                                <textarea id="evolucao" name="evolucao"class="form-control <?= $errors['evolucao'] ? 'is-invalid' : '' ?>" readonly><?= html_entity_decode($evolucaoResult->evolucao)   ?></textarea>
                                                
                            <div class="invalid-feedback">
                                <?= $errors['evolucao'] ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </form>
        

</main>

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
<script >
$( document ).ready(function() {
  

        $("#lista-<?= $evolucaoResult->evolucao_id ?>").removeClass("nav-item");
        $("#lista-<?= $evolucaoResult->evolucao_id ?>").addClass("nav-item2");

});//fim onload
</script>
</body>
</html>

