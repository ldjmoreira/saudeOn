
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <div class="view-padrao2">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Agenda profissional </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                

                        <input type="hidden" name="id" value="<?= $agendaProf[0]->id ?>">
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                   
 
                       
                        <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="profissional">Profissional</label>
                                <select name="profissional" id="profissional" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($profissionais as $prof) {
                                            $selected = $prof->nome_Prof === $agendaProf[0]->nome_Prof ? 'selected' : '';
                                            echo "<option value='{$prof->profissional_id}' {$selected} >{$prof->nome_Prof}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paciente">Paciente</label>
                                <select name="paciente" id="paciente" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($pacientess as $paciente) {
                                            $selected = $paciente->name === $agendaProf[0]->name ? 'selected' : '';
                                            echo "<option value='{$paciente->id}' {$selected} >{$paciente->name}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['paciente'] ?>
                                </div>
                            </div   >
                            <div class="form-group col-md-4">
                                <label for="dataInicial">data inicial</label>
                                <input type="date" id="dataInicial" name="dataInicial"
                                    class="form-control <?= $errors['dataInicial'] ? 'is-invalid' : '' ?>"
                                    value="<?= $agendaProf[0]->dataInicial ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dataInicial'] ?>
                                </div>
                            </div>
                       




                        </div>


                        <div class="form-row">
                                        
                            <div class="form-group col-md-4">
                                <label for="diasAtendimento">Dias de atendimento</label>
                                <input type="text" id="diasAtendimento" name="diasAtendimento"
                                    class="form-control <?= $errors['diasAtendimento'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlentities( $agendaProf[0]->diasAtendimento) ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['diasAtendimento'] ?>
                                </div>
                            </div>
 
                            <div class="form-group col-md-8">
                                <label for="motivoVisita">Motivo da visita</label>
                                <input type="text" id="motivoVisita" name="motivoVisita"
                                    class="form-control <?= $errors['motivoVisita'] ? 'is-invalid' : '' ?>"
                                    value="<?=  htmlentities($agendaProf[0]->motivoVisita)   ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['motivoVisita'] ?>
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
