<script src="assets/js/MenuListaPTS.js"> </script>

<main class="content w3-animate-opacity">
    <?php
    include(TEMPLATE_PATH . "/messages.php");
    ?>
    <form action="#" method="post" id="idOfForm">
        <input type="hidden" name="paciente" value="<?= $paciente[0]->id ?>">
        <input type="hidden" name="operador" value="<?= $id_Op?>">
        <input type="hidden" name="nomeProfissional" value="<?= $infProfissional->profissional_id ?>">
        <input type="hidden" name="CBO" value="<?= $infProfissional->CBO?>">  
        
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Perfil do paciente</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                <div class="caixa-padrao-conteudo-esquerda-foto">
                    <img class="evolucao-foto  w3-border " src="assets/img/avatar2.png" alt="Smiley face" width="100" height="100">
                    
                </div>
                <div class="caixa-padrao-conteudo-direita-conteudo">
                    <h4>Nome:  <?= $paciente[0]->name ?> </h4>
                    
                    <h4>Idade: <?= $age ?></h4>
                </div>
                <div>
                    
                        <a class="a-link-button" href="PTS.php?novo=<?=$paciente[0]->id ?>">
                            Novo registro
                        </a>
                    

                </div>
            </div>

                
        </div> 

        <div class="caixa-data">
        <h3><?=  $today  ?></h3>
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
                <label for="data_PTS">Data de Admissão*</label>
                <input type="date" id="data_PTS" name="data_PTS"
                    class="form-control <?= $errors['data_PTS'] ? 'is-invalid' : '' ?>"
                    value="<?= $PTSResult->data_PTS ?>">
                <div class="invalid-feedback">
                    <?= $errors['data_PTS'] ?>
                </div>
            </div>

                <div class="form-group col-md-4">
                    <label for="CBO2">CBO</label>
                    <input type="text" id="CBO2" name="CBO2" placeholder="Informe a senha"
                        class="form-control <?= $errors['CBO'] ? 'is-invalid' : '' ?>"
                        value="<?= $infcbo->codigo ?> - <?= $infcbo->descricao ?>  " readonly>
                    <div class="invalid-feedback">
                        <?= $errors['CBO'] ?>
                    </div>
                </div>

            </div>     
                        
            </div>
                
            </div>

            <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h2>Plano terapeutico singular</h2>
                </div>
                <div class="caixa-padrao-conteudo">


                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="diagnostico">Diagnóstico*</label>
                            
                                <textarea id="diagnostico" name="diagnostico"class="form-control <?= $errors['diagnostico'] ? 'is-invalid' : '' ?>"><?= html_entity_decode($PTSResult->diagnostico)   ?></textarea>
                                                
                            <div class="invalid-feedback">
                                <?= $errors['diagnostico'] ?>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="definicaoMetas">Definição de metas*</label>
                            <textarea id="definicaoMetas" name="definicaoMetas"class="form-control <?= $errors['definicaoMetas'] ? 'is-invalid' : '' ?>" ><?= html_entity_decode($PTSResult->definicaoMetas) ?></textarea>
                            
                            <div class="invalid-feedback">
                                <?= $errors['definicaoMetas'] ?>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="definicaoResp">Definição de responsabilidade*</label>
                            <textarea id="definicaoResp" name="definicaoResp"class="form-control <?= $errors['definicaoResp'] ? 'is-invalid' : '' ?>" ><?= $PTSResult->definicaoResp ?></textarea>
                            
                            <div class="invalid-feedback">
                                <?= $errors['definicaoResp'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="reavaliacao">Reavaliação*</label>
                            <input type="reavaliacao" id="reavaliacao" name="reavaliacao" placeholder="reavaliação"
                                class="form-control <?= $errors['reavaliacao'] ? 'is-invalid' : '' ?>"
                                value="<?= $PTSResult->reavaliacao ?>">
                            <div class="invalid-feedback">
                                <?= $errors['reavaliacao'] ?>
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
            <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
                <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>

            </div>
        </div>
</main>

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
<script >
$( document ).ready(function() {
  

        $("#lista-<?= $PTSResult->PTS_id ?>").removeClass("nav-item");
        $("#lista-<?= $PTSResult->PTS_id ?>").addClass("nav-item2");


        var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

        $('#data_PTS').val(today)

});//fim onload
</script>
</body>
</html>

