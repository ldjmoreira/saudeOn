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
                <h2>Perfil do paciente</h2>
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
                    value="<?= $infProfissional->nome_Prof ?>" readonly>
                <div class="invalid-feedback">
                    <?= $errors['nomeProfissional'] ?>
                </div>
            </div>



            <div class="form-group col-md-4">
                <label for="data_evolucao">Data de atualização</label>
                <input type="date" id="data_evolucao" name="data_evolucao"
                    class="form-control <?= $errors['data_evolucao'] ? 'is-invalid' : '' ?>"
                    value="<?= $evolucaoResult->data_evolucao ?>" >
                <div class="invalid-feedback">
                    <?= $errors['data_evolucao'] ?>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="CBO2">CBO</label>
                <input type="text" id="CBO2" name="CBO2" placeholder="Informe a senha"
                    class="form-control <?= $errors['CBO'] ? 'is-invalid' : '' ?>"
                    value="<?= $infcbo->codigo ?> - <?= $infcbo->descricao ?> " readonly>
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
                            
                                <textarea id="evolucao" name="evolucao"class="form-control <?= $errors['evolucao'] ? 'is-invalid' : '' ?>"><?= html_entity_decode($evolucaoResult->evolucao)   ?></textarea>
                                                
                            <div class="invalid-feedback">
                                <?= $errors['evolucao'] ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </form>
        
        <div class="footer w3-hide" id="footer-vis">
            <div class="content-footer">
                <h4>salvar modificações? </h4>
            </div>
            <div class="botao-footer">
                <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>
                <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
            </div>
        </div>
</main>

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
<script >
$( document ).ready(function() {
  

        $("#lista-<?= $evolucaoResult->evolucao_id ?>").removeClass("nav-item");
        $("#lista-<?= $evolucaoResult->evolucao_id ?>").addClass("nav-item2");


        var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        $('#data_evolucao').val(today)

});//fim onload
</script>
</body>
</html>

