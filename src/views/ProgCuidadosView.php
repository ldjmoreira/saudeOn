
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

                <div class="form-group col-md-6">
                    <label for="procedimento">Cuidado</label>
                    <select name="procedimento" id="procedimento" class="form-control" >
                    <option value="">Selecionar</option>
                        <?php     

                            foreach($cuidados as $cuidado) {
                                $selected = $cuidado->id === $infCuidados[0]->procedimento ? 'selected' : '';
                                echo "<option value='{$cuidado->id}' {$selected} >{$cuidado->name}</option>";
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $errors['profissional'] ?>
                    </div>
                </div>
                    <div class="form-group col-md-6">
                        <label for="intervalo">Intervalo (min)</label>
                        <input type="text" id="intervalo" name="intervalo"
                            class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>"
                            value="<?= $infCuidados[0]->intervalo ?>">
                        <div class="invalid-feedback">
                            <?= $errors['intervalo'] ?>
                        </div>
                    </div>

                </div>

                <div class="form-row">

                <div class="form-group col-12">
                    <label for="detalhes">Detalhes</label>
                    
                        <textarea id="detalhes" name="detalhes"class="form-control"><?= html_entity_decode($infCuidados[0]->detalhes)   ?></textarea>
                                        
                    <div class="invalid-feedback">
                        <?= $errors['detalhes'] ?>
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

    
