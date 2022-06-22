<script src="assets/js/MenuListaHistorico.js"> </script>
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <div class="view-padrao2">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Agenda profissional detalhada </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $getEmergencia->id ?>">
                        <input type="hidden" name="ciente" value="<?= $getEmergencia->ciente ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
 
          
                       
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="name">Operador responsável</label>
                                <input type="text" id="name" name="name"
                                    class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                                    value="<?= $getEmergencia->name ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['name'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="concentrador">Concentrador</label>
                                <input type="text" id="concentrador" name="concentrador"
                                    class="form-control <?= $errors['concentrador'] ? 'is-invalid' : '' ?>"
                                    value="<?= $getEmergencia->concentrador ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['concentrador'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="dataCiencia">Data da Emergência</label>
                                <input type="date" id="dataCiencia" name="dataCiencia"
                                    class="form-control <?= $errors['dataCiencia'] ? 'is-invalid' : '' ?>"
                                    value="<?= (new DateTime($getEmergencia->datainclusao))->format('Y-m-d') ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dataCiencia'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="hora">Horário</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= (new DateTime($getEmergencia->datainclusao))->format('H:i:s') ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="dataCiencia">Data de ciência</label>
                                <input type="date" id="dataCiencia" name="dataCiencia"
                                    class="form-control <?= $errors['dataCiencia'] ? 'is-invalid' : '' ?>"
                                    value="<?= $getEmergencia->dataCiencia ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dataCiencia'] ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="descricao"
                                    class="form-control <?= $errors['descricao'] ? 'is-invalid' : '' ?>"
                                    value="<?= $getEmergencia->descricao ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['descricao'] ?>
                                </div>
                            </div>

                        </div>
                            
                        




                
            </div>
            <div class="botao-footer2 mb-2 mr-4">
            <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
            </div>
        </div>
         
    </div>
    


</main>
    

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
