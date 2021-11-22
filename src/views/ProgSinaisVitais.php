
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação de sinais vitais</h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $infSinaisVitais[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
                        <input type="hidden" name="ciente" value="<?=    0      ?>">   
                        <input type="hidden" name="ativo" value="<?=    1      ?>">           
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cod_sinal_vital">Sinal Vital</label>
                                <select name="cod_sinal_vital" id="cod_sinal_vital" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($sinaisVitais as $sinalVital) {
                                            $selected = $sinalVital->id === $infSinaisVitais[0]->cod_sinal_vital ? 'selected' : '';
                                            echo "<option value='{$sinalVital->id}' {$selected} >{$sinalVital->descricao}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['cod_sinal_vital'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intervalo">Intervalo</label>
                                <input type="text" id="intervalo" name="intervalo"
                                    class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infSinaisVitais[0]->intervalo ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['intervalo'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoIntervalo">Tipo de intervalo</label>
                                <select name="tipoIntervalo" id="tipoIntervalo" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        $escolhas=['Hora','Minuto'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $infSinaisVitais[0]->tipoIntervalo ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['via'] ?>
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
</body>
</html>

    
