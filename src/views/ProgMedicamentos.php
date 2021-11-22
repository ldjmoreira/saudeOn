
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Programação detalhada de Medicamentos </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $infMedicamentos[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
                        <input type="hidden" name="ciente" value="<?=    0      ?>">   
                        <input type="hidden" name="ativo" value="<?=    1     ?>"> 
                        <input type="hidden" name="lido" value="<?=    0     ?>"> 
          
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="medicamento">Medicamento</label>
                                <select name="medicamento" id="medicamento" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($medicamentos as $medicamento) {
                                            $selected = $medicamento->id === $infMedicamentos[0]->medicamento ? 'selected' : '';
                                            echo "<option value='{$medicamento->id}' {$selected} >{$medicamento->name}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="via">Via</label>
                                <select name="via" id="via" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        $escolhas=['Oral','Sublingual','Retal','Parenteral','Intradérmica',
                                        'Subcutânea','Intramuscular','Endovenosa','Respiratória'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $infMedicamentos[0]->via ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['via'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dose">Dose</label>
                                <input type="text" id="dose" name="dose"
                                    class="form-control <?= $errors['dose'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->dose ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dose'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="hora">hora</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->hora ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="qtd_dose">Quantidade de dose</label>
                                <input type="text" id="qtd_dose" name="qtd_dose"
                                    class="form-control <?= $errors['qtd_dose'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->qtd_dose ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['qtd_dose'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intervalo">Intervalo de dose</label>
                                <input type="text" id="intervalo" name="intervalo"
                                    class="form-control <?= $errors['intervalo'] ? 'is-invalid' : '' ?>"
                                    value="<?= $infMedicamentos[0]->intervalo ?>">
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
                                            $selected = $escolha === $infMedicamentos[0]->tipoIntervalo ? 'selected' : '';
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

                        <div class="form-group col-md-4">
                                <label for="aprazada">Aprazada</label>
                                <select name="aprazada" id="aprazada" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        $escolhas=['1','0'];
                                        $escolhaM=[];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $infMedicamentos[0]->aprazada ? 'selected' : '';
                                            if($escolha) {$escolhaM="Sim";}else{$escolhaM="Não";}
                                            echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['ativo'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="condicao">Condição</label>
                                <input type="text" id="condicao" name="condicao"
                                    class="form-control <?= $errors['condicao'] ? 'is-invalid' : '' ?>"
                                    value="<?=  html_entity_decode($infMedicamentos[0]->condicao)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['condicao'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data">Data</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $cuidador[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
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

    
