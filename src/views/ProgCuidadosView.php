<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação de cuidados </h2>
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
                                <select name="intervalo" id="intervalo" class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>" >
                                <option value="">selecione o intervalo</option>
                                    <?php
                                        
                                        $escolhas=[0 => "Única vez",15 =>"15 minutos",20 =>"20 minutos",30 =>"30 minutos",60 =>"1 hora",
                                        120 =>"2 horas",180 =>"3 horas",240 =>"4 horas",360 =>"6 horas",480=>"8 horas",
                                        720 =>"12 horas",1440 =>"1 dia",2880 =>"2 dias",4320 =>"3 dias",5760 =>"4 dias",
                                        7200 =>"5 dias",8640 =>"6 dias",10080 =>"7 dias"];
                                        $escolhaM=[];
                                        foreach($escolhas as $key => $value) {
                                            $selected = $key == $infCuidados[0]->intervalo ? 'selected' : '';

                                            echo "<option value='{$key}' {$selected} >{$value}</option>";
                                        }
                                ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['intervalo'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="profissional">Cuidador</label>
                                <select name="profissional" id="profissional" class="form-control <?= $errors['profissional'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        
                                        foreach($cuidadores as $uniq) {
                                            $selected = ($uniq->id == $infCuidados[0]->cuidador_id  || $uniq->name == $infCuidados[0]->cuidador_id )  ? 'selected' : '';
                                            echo "<option value='{$uniq->id}' {$selected} >{$uniq->name}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
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
            <div class="botao-footer2 mb-2 mr-4">
                <button type="button" class="btn btn-primary ml-2" onclick="goBack();">voltar</button>
            </div>
        </div>


    </form>
    



</main>


<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
