
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação detalhada de cuidados </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $infCuidados[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">   
                        <input type="hidden" name="lido" value="<?=    0      ?>">             
 
          
                       
                        <div class="form-row">

   
                            <div class="form-group col-md-6">
                                <label for="procedimento">Cuidado</label>
                                <select name="procedimento" id="procedimento" class="form-control <?= $errors['procedimento'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($cuidados as $cuidado) {
                                            $selected = $cuidado->id === $infCuidados[0]->procedimento ? 'selected' : '';
                                            echo "<option value='{$cuidado->id}' {$selected} >{$cuidado->name}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['procedimento'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infCuidados[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
                                </div>
                            </div>
                           

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="hora">hora</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infCuidados[0]->hora ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intervalo">Intervalo</label>
                                <input type="number" id="intervalo" name="intervalo"
                                    class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infCuidados[0]->intervalo ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['intervalo'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipoIntervalo">Tipo de Intervalo</label>
                                <select name="tipoIntervalo" id="tipoIntervalo" class="form-control <?= $errors['tipoIntervalo'] ? 'is-invalid' : '' ?>" >
                                <option value="">Seleção</option>
                                    <?php
                                        $escolhas=['Minuto','Horas'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $infCuidados[0]->tipoIntervalo ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['tipoIntervalo'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="detalhes">Detalhes</label>
                            
                                <textarea id="detalhes" name="detalhes"class="form-control <?= $errors['tipoIntervalo'] ? 'is-invalid' : '' ?>"><?= html_entity_decode($infCuidados[0]->detalhes)   ?></textarea>
                                                
                            <div class="invalid-feedback">
                                <?= $errors['detalhes'] ?>
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
</body>
</html>

    
