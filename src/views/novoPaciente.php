
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
                       


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Nome*</label>
                                <input type="text" id="name" name="name" placeholder="Informe o nome"
                                    class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->name ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['name'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">E-mail*</label>
                                <input type="email" id="email" name="email" placeholder="Informe o email"
                                    class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->email ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['email'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nomeSocial">Nome social</label>
                                <input type="text" id="nomeSocial" name="nomeSocial" placeholder="Informe o nome"
                                    class="form-control <?= $errors['nomeSocial'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->nomeSocial ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['nomeSocial'] ?>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="dataNasc">Data de nascimento*</label>
                                <input type="date" id="dataNasc" name="dataNasc"
                                    class="form-control <?= $errors['dataNasc'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->dataNasc ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dataNasc'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="prontuario">Prontuário*</label>
                                <input type="text" id="prontuario" name="prontuario" placeholder="Informe o numero do prontuário"
                                    class="form-control <?= $errors['prontuario'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->prontuario ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['prontuario'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dataAdmissao">Data de entrada*</label>
                                <input type="date" id="dataAdmissao" name="dataAdmissao"
                                    class="form-control <?= $errors['dataAdmissao'] ? 'is-invalid' : '' ?>"
                                    value="<?= $paciente[0]->dataAdmissao ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['dataAdmissao'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="estadoCivil">Estado civil</label>
                                <select name="estadoCivil" id="estadoCivil" class="form-control" >
                                <option value="">estado civil</option>
                                    <?php
                                        $escolhas=['solteiro','casado','separado','divorciado','viuvo'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $paciente[0]->estadoCivil ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['estadoCivil'] ?>
                                </div>
                            </div>
                        </div>
                            
                        

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cartaoSUS">cartão do sus</label>
                            <input type="text" id="cartaoSUS" name="cartaoSUS" placeholder="informe o número"
                                class="form-control <?= $errors['cartaoSUS'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->cartaoSUS ?>">
                            <div class="invalid-feedback">
                                <?= $errors['cartaoSUS'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="CPF">CPF*</label>
                            <input type="text" id="CPF" name="CPF" placeholder="Informe o nome"
                                class="form-control <?= $errors['CPF'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->CPF ?>">
                            <div class="invalid-feedback">
                                <?= $errors['CPF'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="CID">CID</label>
                            <input type="text" id="CID" name="CID" placeholder="Informe o nome"
                                class="form-control <?= $errors['CID'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->CID ?>">
                            <div class="invalid-feedback">
                                <?= $errors['CID'] ?>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" >
                            <option value="">escolha</option>
                                    <?php
                                        $escolhas=['masculino','feminino'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $paciente[0]->sexo ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>

                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['sexo'] ?>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cidadeNasc">cidade onde nasceu*</label>
                            <input type="text" id="cidadeNasc" name="cidadeNasc" placeholder="informe o número"
                                class="form-control <?= $errors['cidadeNasc'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->cidadeNasc ?>">
                            <div class="invalid-feedback">
                                <?= $errors['cidadeNasc'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cor">Raça /Cor</label>
                            <select name="cor" id="cor" class="form-control" >
                                <option value="">escolha</option>
                                <?php
                                    $escolhas=['branca','preta','amarela','parda','indigena'];
                                    foreach($escolhas as $escolha) {
                                        $selected = $escolha === $paciente[0]->cor ? 'selected' : '';
                                        echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['cor'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nomeResponsavel">Nome do responsável</label>
                            <input type="text" id="nomeResponsavel" name="nomeResponsavel" placeholder="Informe o nome"
                                class="form-control <?= $errors['nomeResponsavel'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->nomeResponsavel ?>">
                            <div class="invalid-feedback">
                                <?= $errors['nomeResponsavel'] ?>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nomeMae">Nome da mãe</label>
                            <input type="text" id="nomeMae" name="nomeMae" placeholder="Informe o nome"
                                class="form-control <?= $errors['nomeMae'] ? 'is-invalid' : '' ?>"
                                value="<?= $paciente[0]->nomeMae ?>">
                            <div class="invalid-feedback">
                                <?= $errors['nomeMae'] ?>
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
    

<script src="assets/js/footer.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

    
