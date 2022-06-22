
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="view-padrao2">
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Perfil cuidador: Dados Gerais</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                                       
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nome*</label>
                        <input type="text" id="name" name="name" placeholder="Informe o nome"
                            class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->name ?>">
                        <div class="invalid-feedback">
                            <?= $errors['name'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">E-mail*</label>
                        <input type="email" id="email" name="email" placeholder="Informe o email"
                            class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->email ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dataNasc">Data de nascimento</label>
                        <input type="date" id="dataNasc" name="dataNasc"
                            class="form-control <?= $errors['dataNasc'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->dataNasc ?>">
                        <div class="invalid-feedback">
                            <?= $errors['dataNasc'] ?>
                        </div>
                    </div>

                </div>


                <div class="form-row">


                    <div class="form-group col-md-4">
                        <label for="dataAdmissao">Data de entrada*</label>
                        <input type="date" id="dataAdmissao" name="dataAdmissao"
                            class="form-control <?= $errors['dataAdmissao'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->dataAdmissao ?>">
                        <div class="invalid-feedback">
                            <?= $errors['dataAdmissao'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estadoCivil">Estado civil*</label>
                        <select name="estadoCivil" id="estadoCivil" class="form-control" >
                        <option value="">estado civil</option>
                            <?php
                                $escolhas=['solteiro','casado','separado','divorciado','viuvo'];
                                foreach($escolhas as $escolha) {
                                    $selected = $escolha === $cuidador[0]->$estadoCivil ? 'selected' : '';
                                    echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errors['estadoCivil'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="CPF">CPF*</label>
                        <input type="text" id="CPF" name="CPF" placeholder="Informe o nome"
                            class="form-control <?= $errors['CPF'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->CPF ?>">
                        <div class="invalid-feedback">
                            <?= $errors['CPF'] ?>
                        </div>
                    </div>
                </div>
                            
                        

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="sexo">Sexo*</label>
                            <select name="sexo" id="sexo" class="form-control" >
                            <option value="">escolha</option>
                                    <?php
                                        $escolhas=['masculino','feminino'];
                                        foreach($escolhas as $escolha) {
                                            $selected = $escolha === $cuidador[0]->sexo ? 'selected' : '';
                                            echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                        }
                                    ?>

                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['sexo'] ?>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="naturalidade">Naturalidade*</label>
                            <input type="text" id="naturalidade" name="naturalidade" placeholder="informe o número"
                                class="form-control <?= $errors['naturalidade'] ? 'is-invalid' : '' ?>"
                                value="<?= $cuidador[0]->naturalidade ?>">
                            <div class="invalid-feedback">
                                <?= $errors['naturalidade'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="vinculoFamiliar">Vínculo Familiar*</label>
                            <input type="text" id="vinculoFamiliar" name="vinculoFamiliar" placeholder="Informe o nome"
                                class="form-control <?= $errors['vinculoFamiliar'] ? 'is-invalid' : '' ?>"
                                value="<?= $cuidador[0]->vinculoFamiliar ?>">
                            <div class="invalid-feedback">
                                <?= $errors['vinculoFamiliar'] ?>
                            </div>
                            
                        </div>
                    </div>


                
            </div>
            <div class="caixa-padrao-titulo">
                <h2>Perfil cuidador: Dados específicos</h2>
            </div>
            <div class="caixa-padrao-conteudo">
                
                        
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="alfabetizacao">Grau de alfabetização*</label>
                        <select name="alfabetizacao" id="alfabetizacao" class="form-control" >
                        <option value="">Seleção</option>
                                <?php
                                    $escolhas=['alfabetizado','Analfabeto','Analfabeto funcional'];
                                    foreach($escolhas as $escolha) {
                                        $selected = $escolha === $cuidador[0]->alfabetizacao ? 'selected' : '';
                                        echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                    }
                                ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errors['alfabetizacao'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="deficiencias">Deficiências2*</label>
                        <input type="deficiencias" id="deficiencias" name="deficiencias" placeholder="Informe o nome"
                            class="form-control <?= $errors['deficiencias'] ? 'is-invalid' : '' ?>"
                            value="<?= html_entity_decode($cuidador[0]->deficiencias)  ?>">
                        <div class="invalid-feedback">
                            <?= $errors['deficiencias'] ?>
                        </div>
                    </div>
                   
                    

                    
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telContato">Telefone de contato*</label>
                        <input type="text" id="telContato" name="telContato" placeholder="anote alguma observação"
                            class="form-control <?= $errors['telContato'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->telContato ?>">
                        <div class="invalid-feedback">
                            <?= $errors['telContato'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="disponibilidade">Disponibilidade*</label>
                        <select name="disponibilidade" id="disponibilidade" class="form-control" >
                        <option value="">Seleção</option>
                                <?php
                                    $escolhas=['alfabetizado','Analfabeto','Analfabeto funcional'];
                                    foreach($escolhas as $escolha) {
                                        $selected = $escolha === $cuidador[0]->disponibilidade ? 'selected' : '';
                                        echo "<option value='{$escolha}' {$selected} >{$escolha}</option>";
                                    }
                                ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errors['alfabetizacao'] ?>
                        </div>
                    </div>

                </div>


                 
            </div> 
            <div class="caixa-padrao-titulo">
                <h3>perfil cuidador: Endereço</h3>
            </div>
            <div class="caixa-padrao-conteudo">
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="endereco">Endereço*</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Informe o nome"
                            class="form-control <?= $errors['endereco'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->endereco ?>">
                        <div class="invalid-feedback">
                            <?= $errors['endereco'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="CEP">CEP*</label>
                        <input type="text" id="CEP" name="CEP" placeholder="Informe o CEP"
                            class="form-control <?= $errors['CEP'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->CEP ?>">
                        <div class="invalid-feedback">
                            <?= $errors['CEP'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro*</label>
                        <input type="text" id="bairro" name="bairro" placeholder="Informe o bairro"
                            class="form-control <?= $errors['bairro'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->bairro ?>">
                        <div class="invalid-feedback">
                            <?= $errors['bairro'] ?>
                        </div>
                    </div>

                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="complemento">Complemento*</label>
                        <input type="text" id="complemento" name="complemento" placeholder="Informe o nome"
                            class="form-control <?= $errors['complemento'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->complemento ?>">
                        <div class="invalid-feedback">
                            <?= $errors['complemento'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cidade">cidade*</label>
                        <input type="text" id="cidade" name="cidade" placeholder="Informe o nome"
                            class="form-control <?= $errors['cidade'] ? 'is-invalid' : '' ?>"
                            value="<?= $cuidador[0]->cidade ?>">
                        <div class="invalid-feedback">
                            <?= $errors['cidade'] ?>
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

    
