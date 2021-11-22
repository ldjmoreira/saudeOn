
<main class="content"  >
    <?php
        include(TEMPLATE_PATH . "/messages.php");

    ?>
    
    <form action="#" method="post" id="idOfForm">
    <input type="hidden" name="profissional_id" value="<?= $listaProfissional[0]->profissional_id ?>">
    <input type="hidden" name="id" value="<?= $listaProfissional[0]->id ?>">
    <input type="hidden" name="operador" value="<?=    $user->id_Op      ?>">  


    
        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Dados Gerais </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                <input type="hidden" name="codigo_profissional" value="<?= $listaProfissional[0]->codigo_profissional ?>">

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="name">Nome do perfil</label>
                        <input type="text" id="name" name="name"
                            class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars_decode($listaProfissional[0]->name)  ?>">
                        <div class="invalid-feedback">
                            <?= $errors['name'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email">E-mail de cadastro</label>
                        <input type="text" id="email" name="email"
                            class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                            value="<?= htmlspecialchars_decode($listaProfissional[0]->email)  ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="start_date">Data de Admissão</label>
                        <input type="date" id="start_date" name="start_date"
                            class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>"
                            value="<?= $listaProfissional[0]->start_date ?>">
                        <div class="invalid-feedback">
                            <?= $errors['start_date'] ?>
                        </div>
                    </div>


                </div>

                <div class="form-row">

                    <div class="form-group col-md-4 pt-4 pb-2">
                        <div class=" w3-display-middle " style="width:100%">
                        <button type="button" class="w3-button w3-block w3-teal " onclick="pas_visibl();">Nova senha</button>
                        </div>
                    </div>

                </div>

                
                <div class="form-row _demoMon2 w3-hide ">
                    
                    <div class="form-group col-md-4">
                        <label for="password">Senha atual</label>
                        <input type="password" id="password" name="password" placeholder="Informe a senha atual" readonly onfocus="this.removeAttribute('readonly');"
                        class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                        </div>
                    </div>


                    <div class="form-group col-md-4">
                        <label for="new_password">Nova senha</label>
                        <input type="password" id="new_password" name="new_password"
                            placeholder="Informe a nova senha" readonly onfocus="this.removeAttribute('readonly');"
                            class="form-control <?= $errors['new_password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['new_password'] ?>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="confirm_password">Confirme a nova senha</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="confirme a nova senha informada" readonly onfocus="this.removeAttribute('readonly');"
                            class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['confirm_password'] ?>
                        </div>
                    </div>


 

                </div>
                           
                
            </div>
            
        </div>
        

        <div class="caixa-padrao">  
            <div class="caixa-padrao-titulo">
                <h2>Dados específicos </h2>
            </div>

            <div class="caixa-padrao-conteudo">
                
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="nome_Prof">Nome do profissional*</label>
                                <input type="text" id="nome_Prof" name="nome_Prof"
                                    class="form-control <?= $errors['nome_Prof'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->nome_Prof)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['nome_Prof'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email_c">E-mail pessoal*</label>
                                <input type="text" id="email_c" name="email_c"
                                    class="form-control <?= $errors['email_c'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->email_c)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['email_c'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="CPF">CPF*</label>
                                <input type="text" id="CPF" name="CPF"
                                    class="form-control <?= $errors['CPF'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->CPF)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['CPF'] ?>
                                </div>
                            </div> 


                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="CBO">CBO*</label>
                                <select name="CBO" id="CBO" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     

                                        foreach($cbos as $cbo) {
                                            $selected = $cbo->id === $listaProfissional[0]->CBO ? 'selected' : '';
                                            echo "<option value='{$cbo->id}' {$selected} >{$cbo->codigo} - {$cbo->descricao} </option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['CBO'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="instituicao">Instituição*</label>
                                <select name="instituicao" id="instituicao" class="form-control" >
                                <option value="">Selecionar</option>
                                    <?php     
                                        foreach($instituicaos as $instituicao) {
                                            $selected = $instituicao->id === $listaProfissional[0]->instituicao ? 'selected' : '';
                                            echo "<option value='{$instituicao->id}' {$selected} >{$instituicao->nomefantasia}</option>";
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors['instituicao'] ?>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="conselho">Conselho</label>
                                <input type="text" id="conselho" name="conselho"
                                    class="form-control <?= $errors['conselho'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->conselho)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['conselho'] ?>
                                </div>
                            </div>

                        </div>

                    <hr/>

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="dataNasc">Data de Nascimento*</label>
                            <input type="date" id="dataNasc" name="dataNasc"
                                class="form-control <?= $errors['dataNasc'] ? 'is-invalid' : '' ?>"
                                value="<?= $listaProfissional[0]->dataNasc ?>">
                            <div class="invalid-feedback">
                                <?= $errors['dataNasc'] ?>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="UF">UF*</label>
                            <input type="text" id="UF" name="UF"
                                class="form-control <?= $errors['UF'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaProfissional[0]->UF)  ?>">
                            <div class="invalid-feedback">
                                <?= $errors['UF'] ?>
                            </div>
                        </div> 

                   
                    
                        <div class="form-group col-md-4">
                            <label for="endereco">endereço*</label>
                            <input type="text" id="endereco" name="endereco"
                                class="form-control <?= $errors['endereco'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaProfissional[0]->endereco)  ?>">
                            <div class="invalid-feedback">
                                <?= $errors['endereco'] ?>
                            </div>
                        </div>  

                                          
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="complemento">complemento*</label>
                                <input type="text" id="complemento" name="complemento"
                                    class="form-control <?= $errors['complemento'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->complemento)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['complemento'] ?>
                                </div>
                            </div>  


                            <div class="form-group col-md-4">
                                <label for="CEP">CEP*</label>
                                <input type="text" id="CEP" name="CEP"
                                    class="form-control <?= $errors['CEP'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->CEP)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['CEP'] ?>
                                </div>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro*</label>
                                <input type="text" id="bairro" name="bairro"
                                    class="form-control <?= $errors['bairro'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->bairro)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['bairro'] ?>
                                </div>
                            </div> 
                        </div> 
                       
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="cidade">cidade*</label>
                            <input type="text" id="cidade" name="cidade"
                                class="form-control <?= $errors['cidade'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaProfissional[0]->cidade)  ?>">
                            <div class="invalid-feedback">
                                <?= $errors['cidade'] ?>
                            </div>
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="sexo">sexo*</label>
                            <select name="sexo" id="sexo" class="form-control" >
                            <option value="">Selecione</option>
                                <?php
                        
                                    $escolhas=['M','F'];
                                    $escolhaM=[];
                                    foreach($escolhas as $escolha) {
                                        $selected = $escolha === $listaProfissional[0]->sexo ? 'selected' : '';
                                        if($escolha =="M") {$escolhaM="Masculino";}else{$escolhaM="Feminino";}
                                        echo "<option value='{$escolha}' {$selected} >{$escolhaM}</option>";
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['ciente'] ?>
                            </div>
                        </div> 
                                        
                        <div class="form-group col-md-4">
                            <label for="estadoCivil">Estado Civil* </label>
                            <input type="text" id="estadoCivil" name="estadoCivil"
                                class="form-control <?= $errors['estadoCivil'] ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars_decode($listaProfissional[0]->estadoCivil)  ?>">
                            <div class="invalid-feedback">
                                <?= $errors['estadoCivil'] ?>
                            </div>
                                
                        </div>


                    </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-4">
                                <label for="telContato">Telefone* </label>
                                <input type="text" id="telContato" name="telContato"
                                    class="form-control <?= $errors['telContato'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->telContato)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['telContato'] ?>
                                </div>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <label for="especialidade1"> 1° Especialiadde </label>
                                <input type="text" id="especialidade1" name="especialidade1"
                                    class="form-control <?= $errors['especialidade1'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->especialidade1)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['especialidade1'] ?>
                                </div>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <label for="especialidade2"> 2° Especialiadde </label>
                                <input type="text" id="especialidade2" name="especialidade2"
                                    class="form-control <?= $errors['especialidade2'] ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars_decode($listaProfissional[0]->especialidade2)  ?>">
                                <div class="invalid-feedback">
                                    <?= $errors['especialidade2'] ?>
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
<script src="assets/js/button_visible.js"></script>
</body>
</html>

    
