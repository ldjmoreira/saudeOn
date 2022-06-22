
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
                            <div class="form-group col-md-6">
                                <label for="cod_sinal_vital">Sinal Vital</label>
                                <select name="cod_sinal_vital" id="cod_sinal_vital" class="form-control" disabled >
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

                            <div class="form-group col-md-6">
                                <label for="intervalo">Intervalo</label>
                                <select name="intervalo" id="intervalo" class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>" >
                                <option value="">selecione o intervalo</option>
                                    <?php
                                    
                                        $escolhas=[1 => "1 minuto",5 =>"5 minutos",15 =>"15 minutos",30 =>"30 minutos",60 =>"1 hora",
                                        120 =>"2 horas"];
                                        $escolhaM=[];
                                        foreach($escolhas as $key => $value) {
                                            $selected = $key == $infSinaisVitais[0]->intervalo ? 'selected' : '';

                                            echo "<option value='{$key}' {$selected} >{$value}</option>";
                                        }
                                ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['intervalo'] ?>
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

    
