
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="view-padrao2">
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação detalhada de cuidados</h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
            
               
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


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ativo">Status</label>
                        <select name="ativo" id="ativo" class="form-control" >
                        <option value="">Selecionar</option>
                            <?php     
                                $escolhas=['1','0'];
                                $escolhaM=[];
                                foreach($escolhas as $escolha) {
                                    $selected = $escolha === $infSinaisVitais[0]->ativo ? 'selected' : '';
                                    if($escolha) {$escolhaM="Ativo";}else{$escolhaM="Inativo";}
                                    echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errors['ativo'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ciente">Ciente</label>
                        <select name="ciente" id="ciente" class="form-control" >
                        <option value="">Selecionar</option>
                            <?php     
                                $escolhas=['1','0'];
                                $escolhaM=[];
                                foreach($escolhas as $escolha) {
                                    $selected = $escolha === $infSinaisVitais[0]->ciente ? 'selected' : '';
                                    if($escolha) {$escolhaM="Sim";}else{$escolhaM="Não";}
                                    echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errors['ativo'] ?>
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

    
