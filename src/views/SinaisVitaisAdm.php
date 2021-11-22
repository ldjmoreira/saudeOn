
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Sinais Vitais </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?= $listaSinais[0]->id ?>">
                        <input type="hidden" name="paciente" value="<?=    $pacInfo->id_pac      ?>">    
                        <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">                
                        <input type="hidden" name="descricao" value="">  
                         
                        <div class="form-row">

                        <div class="form-group col-md-6">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control" onchange="mySelect()" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        $escolhas=['2','3','4','5','6','7'];
                                        $escolhaM=[];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $listaSinais[0]->tipo ? 'selected' : '';
                                            if($escolha == '2') 
                                            {$escolhaM="Pressão Arterial Sistólica";
                                            }elseif($escolha == '3')
                                            {$escolhaM="Frequência Cardiaca";
                                            }elseif($escolha == '4')
                                            {$escolhaM="Temperatura Corporal";
                                            }elseif($escolha == '5')  
                                            {$escolhaM="Saturação de Oxigenio";
                                            }elseif($escolha == '6')  
                                            {$escolhaM="Frequencia respiratória";
                                            }elseif($escolha == '7')
                                            {$escolhaM="Pressão Arterial Diastólica";
                                            }
                                            echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['ativo'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="codsensor">codsensor</label>
                                <input type="text" id="codsensor" name="codsensor"
                                class="form-control <?= $errors['codsensor'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaSinais[0]->codsensor)  ?>">
                                <div class="invalid-feedback">
                                <?= $errors['codsensor'] ?>
                                </div>
                            </div>   
                            
                             


                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="maximo">Máximo</label>
                                <input type="number" id="maximo" name="maximo"
                                class="form-control <?= $errors['maximo'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaSinais[0]->maximo)  ?>">
                                <div class="invalid-feedback">
                                <?= $errors['maximo'] ?>
                                </div>
                            </div>  

                            <div class="form-group col-md-6">
                            <label for="minimo">Mínimo</label>
                                <input type="number" id="minimo" name="minimo"
                                class="form-control <?= $errors['minimo'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaSinais[0]->minimo)  ?>">
                                <div class="invalid-feedback">
                                <?= $errors['minimo'] ?>
                                </div>
                            </div>  


  

                        </div>

                        <div class="form-row">

                        <div class="form-group col-md-6">
                        <label for="unidade">Unidade</label>
                            <input type="text" id="unidade" name="unidade"
                            class="form-control <?= $errors['unidade'] ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars_decode($listaSinais[0]->unidade)  ?>">
                            <div class="invalid-feedback">
                            <?= $errors['unidade'] ?>
                            </div>
                        </div> 
                        
                        <div class="form-group col-md-6">
                            <label for="data">Data de registro</label>
                            <input type="date" id="data" name="data"
                                class="form-control <?= $errors['data'] ? 'is-invalid' : '' ?>"
                                value="<?= $listaSinais[0]->data ?>">
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
            <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>
            <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
        </div>
    </div>

</main>
    
<script src="assets/js/sinaisVitaisAdm.js"></script>
<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
