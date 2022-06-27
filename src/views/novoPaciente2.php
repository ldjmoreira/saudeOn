
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">

        <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h3>perfil paciente: Dados Gerais</h3>
                </div>

            <div class="caixa-padrao-conteudo">
                
                        <input type="hidden" name="id" value="<?=$paciente[0]->id ?>">
                        <input type="hidden" name="operador" value="<?= $user->id_Op   ?>">
                       

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:void(0)" onclick="openCity(event, 'London');" >Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" onclick="openCity(event, 'Paris');">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" onclick="openCity(event, 'Tokyo');" >Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>


                    <div id="London" class="tabcontent" >
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="altura">Altura</label>
                                    <input type="text" id="altura" name="altura" placeholder="Informe a altura"
                                        class="form-control <?= $errors['altura'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->altura ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['altura'] ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="peso">peso</label>
                                    <input type="number" id="peso" name="peso" placeholder="Informe o peso"
                                        class="form-control <?= $errors['peso'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->peso2 ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['peso'] ?>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div id="Paris" style="display:none" class="tabcontent">
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="altura">Altura2</label>
                                    <input type="text" id="altura2" name="altura2" placeholder="Informe a altura"
                                        class="form-control <?= $errors['altura2'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->altura2 ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['altura2'] ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="peso">peso2</label>
                                    <input type="number" id="peso2" name="peso2" placeholder="Informe o peso"
                                        class="form-control <?= $errors['peso2'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->peso ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['peso'] ?>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div id="Tokyo" style="display:none" class="tabcontent">
                        
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="altura">Altura3</label>
                                    <input type="text" id="altura3" name="altura3" placeholder="Informe a altura"
                                        class="form-control <?= $errors['altura3'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->altura ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['altura'] ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="peso">peso3</label>
                                    <input type="number" id="peso" name="peso" placeholder="Informe o peso"
                                        class="form-control <?= $errors['peso'] ? 'is-invalid' : '' ?>"
                                        value="<?= $paciente[0]->peso ?>">
                                    <div class="invalid-feedback">
                                        <?= $errors['peso'] ?>
                                    </div>
                                </div>
                        </div>
                    </div>

                      
                
            </div>
        </div>  


        <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h2>perfil paciente: Dados específicos</h2>
                </div>

            <div class="caixa-padrao-conteudo">
                
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="altura">Altura</label>
                                <input type="text" id="altura" name="altura" placeholder="Informe a altura"
                                    class="form-control <?= $errors['altura'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->altura ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['altura'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="peso">peso</label>
                                <input type="number" id="peso" name="peso" placeholder="Informe o peso"
                                    class="form-control <?= $errors['peso'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->peso ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['peso'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoSangue">Tipo sanguineo</label>
                                <input type="text" id="tipoSangue" name="tipoSangue" placeholder="Informe o tipoSangue"
                                    class="form-control <?= $errors['tipoSangue'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->tipoSangue ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['tipoSangue'] ?>
                                </div>
                            </div>



                        </div>



                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="queda">Risco de queda</label>
                            <select name="queda" id="queda" class="form-control" >
                            <option value="">escolher</option>
                                    <?php
                                        $escolhas=['sim','não'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $paciente[0]->queda ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['queda'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="saturacaoO2">Saturação do oxigênio</label>
                            <input type="saturacaoO2" id="saturacaoO2" name="saturacaoO2" placeholder="Informe o nome"
                                class="form-control <?= $errors['saturacaoO2'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->saturacaoO2 ?>">
                            <div class="invalid-feedback">
                                <?= $errors['saturacaoO2'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="temperaturaCorporal">temperatura corporal</label>
                            <input type="number" id="temperaturaCorporal" name="temperaturaCorporal" placeholder="Informe o nome"
                                class="form-control <?= $errors['temperaturaCorporal'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->temperaturaCorporal ?>">
                            <div class="invalid-feedback">
                                <?= $errors['temperaturaCorporal'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="frequenciaCardiaca">frequência cardiaca</label>
                            <input type="text" id="frequenciaCardiaca" name="frequenciaCardiaca" placeholder="Informe o nome"
                                class="form-control <?= $errors['frequenciaCardiaca'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->frequenciaCardiaca ?>">
                            <div class="invalid-feedback">
                                <?= $errors['frequenciaCardiaca'] ?>
                            </div>
                        </div>

                        
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="pressaoSistolica">Pressão sistólica</label>
                            <input type="text" id="pressaoSistolica" name="pressaoSistolica" placeholder="anote a pressão sistólica"
                                class="form-control <?= $errors['pressaoSistolica'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->pressaoSistolica ?>">
                            <div class="invalid-feedback">
                                <?= $errors['pressaoSistolica'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pressaoDiastolica">Pressão diastólica</label>
                            <input type="text" id="pressaoDiastolica" name="pressaoDiastolica" placeholder="anote a pressão diastólica"
                                class="form-control <?= $errors['pressaoDiastolica'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->pressaoDiastolica ?>">
                            <div class="invalid-feedback">
                                <?= $errors['pressaoDiastolica'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="maoDominante">Mão dominante</label>
                            <input type="text" id="maoDominante" name="maoDominante" placeholder="Informe a mão dominante"
                                class="form-control <?= $errors['maoDominante'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->maoDominante ?>">
                            <div class="invalid-feedback">
                                <?= $errors['maoDominante'] ?>
                            </div>
                        </div>
   
                    </div>


                    





                
            </div>
        </div>



        <div class="caixa-padrao">  
                <div class="caixa-padrao-titulo">
                    <h3>perfil paciente: Endereço</h3>
                </div>

            <div class="caixa-padrao-conteudo">
                
                        
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="endereco">Endereço</label>
                                <input type="text" id="endereco" name="endereco" placeholder="Informe o nome"
                                    class="form-control <?= $errors['endereco'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->endereco ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['endereco'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" id="cep" name="cep" placeholder="Informe o cep"
                                    class="form-control <?= $errors['cep'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->cep ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['cep'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Informe o bairro"
                                    class="form-control <?= $errors['bairro'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->bairro ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['bairro'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="complemento">Complemento</label>
                                <input type="text" id="complemento" name="complemento" placeholder="Informe o nome"
                                    class="form-control <?= $errors['complemento'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->complemento ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['complemento'] ?>
                                </div>
                            </div>
                        </div>



                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="municipio">Município</label>
                            <input type="text" id="municipio" name="municipio" placeholder="Informe o nome"
                                class="form-control <?= $errors['municipio'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->municipio ?>">
                            <div class="invalid-feedback">
                                <?= $errors['municipio'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="UF">UF</label>
                            <input type="UF" id="UF" name="UF" placeholder="Informe o nome"
                                class="form-control <?= $errors['UF'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->UF ?>">
                            <div class="invalid-feedback">
                                <?= $errors['UF'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telCelular">telefone celular</label>
                            <input type="text" id="telCelular" name="telCelular" placeholder="Informe o nome"
                                class="form-control <?= $errors['telCelular'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->telCelular ?>">
                            <div class="invalid-feedback">
                                <?= $errors['telCelular'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telContato">telefone residêncial</label>
                            <input type="text" id="telContato" name="telContato" placeholder="Informe o nome"
                                class="form-control <?= $errors['telContato'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->telContato ?>">
                            <div class="invalid-feedback">
                                <?= $errors['telContato'] ?>
                            </div>
                        </div>

                        
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="observacao">Observação</label>
                            <input type="text" id="observacao" name="observacao" placeholder="anote alguma observação"
                                class="form-control <?= $errors['observacao'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->observacao ?>">
                            <div class="invalid-feedback">
                                <?= $errors['observacao'] ?>
                            </div>
                        </div>
   
                    </div>


                    





                
            </div>
        </div> 


    </form>
    

    <div class="footer2 w3-hide" id="footer-vis">
        <div class="content-footer">
            <h4>salvar modificações?? </h4>
        </div>
        <div class="botao-footer">
            <button type="button" class="btn btn-success ml-2" onclick="doPreview();">salvar</button>
            <button type="button" class="btn btn-danger ml-2" onclick="goBack();">voltar</button>
        </div>
    </div>

</main>
    

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tabcontent");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("nav-link");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>
</html>

    
