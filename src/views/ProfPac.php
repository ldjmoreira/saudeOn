
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Agenda do paciente </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $profpac[0]->id ?>">
                        <input type="hidden" name="ciente" value="<?= $profpac[0]->ciente ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">   
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
                        <input type="hidden" name="lido" value="<?=    0    ?>"> 

                        
          
                       
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="profissional">Profissional</label>
                                <select name="profissional" id="profissional" class="form-control <?= $errors['profissional'] ? 'is-invalid' : '' ?>" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        
                                        foreach($profissionais as $prof) {
                                            $selected = ($prof->nome_Prof == $profpac[0]->profissional || $prof->profissional_id == $profpac[0]->profissional)  ? 'selected' : '';
                                            echo "<option value='{$prof->profissional_id}' {$selected} >{$prof->nome_Prof}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['profissional'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="turno">Turno da visita</label>
                                <select name="turno" id="turno" class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>" >
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
                            <div class="form-group col-md-2">
                                <label for="data">Data inicial</label>
                                <input type="date" id="data" name="data"
                                    class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->data ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['data'] ?>
                                </div>
                            </div>


                            <div class="form-group col-md-2">
                                <label for="hora">hora da visita</label>
                                <input type="time" id="hora" name="hora"
                                    class="form-control <?= $errors['hora'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->hora ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['hora'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="duracao">Duração (horas)</label>
                                <input type="number" id="duracao" name="duracao"
                                    class="form-control <?= $errors['duracao'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->duracao ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['duracao'] ?>
                                </div>
                            </div>


                        </div>


                        <div class="form-row">



                            <div class="form-group col-md-8">
                                <label for="motivo">Motivo da visita</label>
                                <input type="text" id="motivo" name="motivo"
                                    class="form-control <?= $errors['motivo'] ? 'is-invalid' : '' ?>"
                                    value="<?= $profpac[0]->motivo ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['motivo'] ?>
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="periodicidade">Intervalo</label>
                                <select name="periodicidade" id="periodicidade" class="form-control" >
                                <option value="">selecione o intervalo</option>
                                    <?php
                                    
                                        $escolhas=['0', '1440','2880','4320','5760','7200','8640','10080','21600'];
                                        $escolhaM=[];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $profpac[0]->periodicidade ? 'selected' : '';
                                            if($escolha =='0' ){
                                                $escolhaM='Única visita';
                                            }elseif($escolha =='1440' ) {
                                                $escolhaM="Todos os dias";
                                            }elseif($escolha =='2880'){
                                                $escolhaM="A cada 2 dias";
                                            }elseif($escolha == '4320'){
                                                $escolhaM="A cada 3 dias";
                                            }elseif($escolha == '5760'){
                                                $escolhaM="A cada 4 dias";
                                            }elseif($escolha == '7200'){
                                                $escolhaM="A cada 5 dias";
                                            }elseif($escolha == '8640'){
                                                $escolhaM="A cada 6 dias";
                                            }elseif($escolha == '10080'){
                                                $escolhaM="A cada 7 dias";
                                            }elseif($escolha == '21600'){
                                                $escolhaM="Quinzenalmente";
                                            }
                                            echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                        }
                                ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['ativo'] ?>
                                </div>
                            </div>
                            <?php
                                $url = $_SERVER['REQUEST_URI'];

                                $pieces = explode("?", $url);

                                if(strpos($pieces[1],'update') !== false){
                            ?>
                            <div class="form-group col-md-1">
                                <label for="is_admin"> Remover</label>
                                <input type="checkbox" id="button_progMedicamentos" name="button"
                                
                                    class="form-control <?= $errors['is_admin'] ? 'is-invalid' : '' ?>"
                                    <?= $is_admin ? 'checked' : '' ?>>
                                <div class="invalid-feedback">
                                    <?= $errors['is_admin'] ?>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
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

    
