
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="view-padrao2">
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Agenda profissional detalhada</h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $profpac[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $id      ?>">                   
 
          
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="profissional">Profissional</label>
                                <select name="profissional" id="profissional" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($profissionais as $prof) {
                                            $selected = $prof->nome_Prof === $profpac[0]->nome_Prof ? 'selected' : '';
                                            echo "<option value='{$prof->profissional_id}' {$selected} >{$prof->nome_Prof}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="motivo">Motivo da visita</label>
                                <input type="text" id="motivo" name="motivo"
                                    class="form-control <?= $errors['motivo'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->motivo ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['motivo'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="turno">Turno da visita</label>
                                <select name="turno" id="turno" class="form-control" >
                                <option value="">Seleção</option>
                                    <?php
                                        $escolhas=['Matutino','Vespertino','Noturno', 'Integral'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $profpac[0]->turno ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['turno'] ?>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <label for="data">Data inicial</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ciente">ciente da visita</label>
                                <input type="text" id="ciente" name="ciente"
                                    class="form-control <?= $errors['ciente'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->ciente ? "sim" : "Não" ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['ciente'] ?>
                                </div>
                            </div>                            


                            <div class="form-group col-md-4">
                                <label for="hora">hora da visita</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->hora ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
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

    
